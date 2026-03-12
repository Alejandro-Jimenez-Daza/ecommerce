<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once __DIR__ . '/../../model/conexionBD.php';

    $id = (int) $_POST["id_producto"]; //int evita que lleguen cosas diferentes al id
    $accion = $_POST["accion"] ?? "agregar"; //sumar o restar

    // verificar que el producto existe antes de agregar

    // verificar que el producto existe antes de agregar
    $sql = "SELECT id FROM productos WHERE id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        echo json_encode(["ok" => false, 'mensaje' => "Producto no existe"]);
        exit;
    }
    // inicializo el carrito si no existe
    if (!isset($_SESSION["carrito"])) {
        $_SESSION["carrito"] = [];
    }

    // 3. switch para las acciones de restar o sumar con los botones que tengo en la vista de miCarrito.php
    switch ($accion) {
        case 'sumar':
            $_SESSION["carrito"][$id] = ($_SESSION["carrito"][$id] ?? 0) + 1;
            break;

        case 'restar':
            $_SESSION["carrito"][$id]--;
            if ($_SESSION["carrito"][$id] <= 0) {
                unset($_SESSION["carrito"][$id]);
            }
            break;

        default: //agregar
            // si el producto ya esta suma 1, si no lo agrega
            if (isset($_SESSION["carrito"][$id])) {
                $_SESSION["carrito"][$id]++;
            } else {
                $_SESSION["carrito"][$id] = 1;
            }
    }

    $totalItems = array_sum($_SESSION["carrito"]);
    echo json_encode(["ok" => true, "total" => $totalItems]);
}
