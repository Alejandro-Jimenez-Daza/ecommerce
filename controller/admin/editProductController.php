<?php

// verifico que el metodo haya sido post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // me conecto a la base de datos
    require_once('../../model/conexionBD.php');

    // guardo las variables enviadas al formulario y verifico que no esten vacias
    $edit_id = $_POST["id_editar"];

    // anido el if vara ver si las variables son null, isset devuelve true o false
    // verifico si las variables no estan vacias
    // cambiar isset por empty, isset solo mira si la variable esta creada, pero empty detecta vacios


    if (
        empty($edit_id)
    ) {
        echo "Hubo un error, no se paso el ID correctamente";
    }

    // try para la consulta de bd
    try {
        $sql = "SELECT nombre_producto, precio, stock, imagen, descripcion FROM productos WHERE id = :id ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $edit_id);
        $stmt->execute();

        if ($stmt->rowCount() >= 1) {
            header("Location: ../../view/adminPanel/editarProducto.php");
            exit;
        } else {
            echo "no se elimino nada";
        }
    } catch (PDOException $e) {
        echo "eliminar: " . $e->getMessage();
    }
} else {
    echo "error metodo post form";
}
