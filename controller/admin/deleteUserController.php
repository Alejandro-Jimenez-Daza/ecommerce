<?php
// require detiene el script con un error fatal si falta el archivo, 
// mientras que include solo lanza una advertencia. Las versiones _once 
// (require_once/include_once) aseguran que el archivo se cargue una sola vez, evitando 
// errores de redeclaración de funciones


// verifico que el metodo haya sido post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // me conecto a la base de datos
    require_once('../../model/conexionBD.php');

    // guardo las variables enviadas al formulario y verifico que no esten vacias
    $delete_id = $_POST["id_borrar"];

    // anido el if vara ver si las variables son null, isset devuelve true o false
    // verifico si las variables no estan vacias
    // cambiar isset por empty, isset solo mira si la variable esta creada, pero empty detecta vacios


    if (
        empty($delete_id)
    ) {
        echo "Hubo un error, no se paso el ID";
    }

    // try para la consulta de bd, se realiza un soft delete para conservar datos
    try {
        $sql = "UPDATE usuarios set activo = 0 WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $delete_id);
        $stmt->execute();

        if ($stmt->rowCount() >= 1) {
            header("Location: ../../view/adminPanel/usuariosPanel.php");
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
