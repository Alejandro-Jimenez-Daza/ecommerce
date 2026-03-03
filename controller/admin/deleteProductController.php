<?php

/*require: detiene el script con un error fatal si falta el archivo, 
mientras que include solo lanza una advertencia. Las versiones _once 
(require_once/include_once) aseguran que el archivo se cargue una sola vez, evitando 
errores de redeclaración de funciones*/


// verifico que el metodo haya sido post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // me conecto a la base de datos
    require_once('../../model/conexionBD.php');

    // guardo las variables enviadas al formulario y verifico que no esten vacias
    $delete_id = $_POST["id_borrar"];

    $sql = "SELECT *
                FROM productos
                WHERE id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $delete_id);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    $nombre_imagen = $usuario['imagen'];


    // anido el if vara ver si las variables son null, isset devuelve true o false
    // verifico si las variables no estan vacias


    if (
        empty($delete_id)
    ) {
        echo "Hubo un error, no se paso el ID";
        exit;
    }

    // try para la consulta de bd
    try {
        $sql = "DELETE FROM productos WHERE id = :id ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $delete_id);
        $stmt->execute();


        if ($stmt->rowCount() >= 1) {

            $ruta_fisica = __DIR__ . "/../../resources/static/" . $nombre_imagen;

            if (file_exists($ruta_fisica)) {
                unlink($ruta_fisica);
                header("Location: ../../view/adminPanel/productosPanel.php");
            } else {
                echo "arhcivo no existe";
            }
            exit;
        } else {

            echo "no se eliminó nada";
        }
    } catch (PDOException $e) {

        echo "eliminar: " . $e->getMessage();
    }
} else {

    echo "El formulario no paso el producto correctamente";
}


// PENDIENTE DE REALIZAR EL DELETE DEL ARCHIVO AL ELIMINAR TAMBEIN EL PRODUCTO, VERIFICAR ALGORITMO EN CLAUDE SONNET.

// __DIR__	  /opt/lampp/htdocs/ecommerce/config	   El servidor (PHP)
// BASE_URL	  http://localhost/ecommerce/	           El navegador (Usuario)