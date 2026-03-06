<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/model/conexionBD.php';

use Dotenv\Dotenv;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\MercadoPagoConfig;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
MercadoPagoConfig::setAccessToken($_ENV['MP_ACCESS_TOKEN']);

$notificacion = file_get_contents("php://input");
$datos = json_decode($notificacion, true);

// log debug
$file = fopen('pagos.txt', 'a');
fwrite($file, json_encode($datos, JSON_PRETTY_PRINT) . PHP_EOL);
fclose($file);

// solo procesar tipo "payment" del formato webhook v2
if (!isset($datos['type']) || $datos['type'] !== 'payment') {
    http_response_code(200);
    exit;
}

$paymentId    = $datos['data']['id'];
$paymentClient = new PaymentClient();

try {
    $payment = $paymentClient->get($paymentId);

    // solo guardar si fue aprobado
    if ($payment->status !== 'approved') {
        http_response_code(200);
        exit;
    }

    // extraer id usuario del external_reference "USER-5" → 5
    $id_usuario    = (int) str_replace('USER-', '', $payment->external_reference);
    $mp_payment_id = (string) $payment->id;
    $total         = $payment->transaction_amount;
    $estado        = $payment->status;
    $external_ref  = $payment->external_reference;

    // verificar duplicado
    $sqlCheck = "SELECT id FROM ordenes WHERE mp_payment_id = :mp_payment_id LIMIT 1";
    $stmtCheck = $pdo->prepare($sqlCheck);
    $stmtCheck->bindParam(':mp_payment_id', $mp_payment_id);
    $stmtCheck->execute();

    if ($stmtCheck->rowCount() > 0) {
        http_response_code(200);
        exit;
    }

    // insertar orden — sin preference_id porque no viene en el payment
    $sqlOrden = "INSERT INTO ordenes 
                    (id_usuario, mp_payment_id, total, estado, external_ref)
                 VALUES 
                    (:id_usuario, :mp_payment_id, :total, :estado, :external_ref)";

    $stmtOrden = $pdo->prepare($sqlOrden);
    $stmtOrden->bindParam(':id_usuario',    $id_usuario);
    $stmtOrden->bindParam(':mp_payment_id', $mp_payment_id);
    $stmtOrden->bindParam(':total',         $total);
    $stmtOrden->bindParam(':estado',        $estado);
    $stmtOrden->bindParam(':external_ref',  $external_ref);
    $stmtOrden->execute();

    $id_orden = $pdo->lastInsertId();

    // insertar detalle — items vienen en additional_info
    foreach ($payment->additional_info->items as $item) {
        $id_producto = (int) $item->id;
        $cantidad    = (int) $item->quantity;
        $precio_unit = (float) $item->unit_price;

        $sqlDetalle = "INSERT INTO orden_detalle 
                          (id_orden, id_producto, cantidad, precio_unit)
                       VALUES 
                          (:id_orden, :id_producto, :cantidad, :precio_unit)";

        $stmtDetalle = $pdo->prepare($sqlDetalle);
        $stmtDetalle->bindParam(':id_orden',    $id_orden);
        $stmtDetalle->bindParam(':id_producto', $id_producto);
        $stmtDetalle->bindParam(':cantidad',    $cantidad);
        $stmtDetalle->bindParam(':precio_unit', $precio_unit);
        $stmtDetalle->execute();
    }
} catch (Exception $e) {
    error_log("Error notifica.php: " . $e->getMessage());
}

http_response_code(200);
