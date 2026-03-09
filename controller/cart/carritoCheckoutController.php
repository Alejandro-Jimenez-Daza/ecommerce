<?php
session_start();
// paquetes de composer
require_once __DIR__ . '/../../vendor/autoload.php';
//conexion a mi BD
require_once __DIR__ . '/../../model/conexionBD.php';

use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

MercadoPagoConfig::setAccessToken($_ENV['MP_ACCESS_TOKEN']);


// 1. leer el carrito de sesión
$arrayIdProductos = $_SESSION["carrito"] ?? [];

if (empty($arrayIdProductos)) {
    header("Location: ../../view/miCarrito.php");
    exit;
}

// 2. consultar los productos reales de la BD
$ids = array_keys($arrayIdProductos);
$placeholders = [];
foreach ($ids as $i => $id) {
    $placeholders[] = ":id$i";
}

$inString = implode(",", $placeholders);

$sql = "SELECT * FROM productos WHERE id IN ($inString)";
$stmt = $pdo->prepare($sql);
foreach ($ids as $i => $id) {
    $stmt->bindValue(":id$i", $id, PDO::PARAM_INT);
}
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);


// 3. armar los items para MP con datos reales
$items = [];
foreach ($productos as $producto) {
    $id_prod  = $producto['id'];
    $cantidad = $arrayIdProductos[$id_prod];

    $items[] = [
        "id"          => (string) $id_prod,
        "title"       => $producto['nombre_producto'],
        "quantity"    => (int) $cantidad,
        "unit_price"  => (float) $producto['precio'],
        "category_id" => "others"
    ];
}



// 4. crear la preference con datos reales
$client = new PreferenceClient();

try {
    $preference = $client->create([
        "items" => $items,

        "payer" => [
            "name"  => $_SESSION['nombre'],
            "email" => "test_user_comprador@testuser.com" // luego lo sacamos del perfil real
        ],

        "back_urls" => [
            "success" => $_ENV["URL_HOST"] . "/ecommerce/view/dashboard.php",
            "failure" => $_ENV["URL_HOST"] . "/ecommerce/view/carritoError.php",
            "pending" => $_ENV["URL_HOST"] . "/ecommerce/view/carritoPendiente.php"
        ],

        // para autoredigir despues de un pago
        "auto_return" => "approved", // ← esto redirige automáticamente si fue aprobado

        "payment_methods" => [
            "installments" => 2
        ],

        "shipments" => [
            "mode" => "not_specified"
        ],

        "statement_descriptor" => "Mi tienda",
        "external_reference"   => "USER-" . (string) $_SESSION['id'],
        "notification_url"     =>  $_ENV["URL_HOST"] . "/ecommerce/notifica.php" //reemplazar por la generada en tunnelmole, con https
    ]);

    // 5. redirigir al checkout de MP
    header("Location: " . $preference->init_point); // init_point = URL del checkout
    exit;
} catch (\MercadoPago\Exceptions\MPApiException $e) {
    echo "Error MP: ";
    print_r($e->getApiResponse()->getContent());
}
