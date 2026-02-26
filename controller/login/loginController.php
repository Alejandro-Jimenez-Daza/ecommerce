<?php

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    // aca llamo la conexion a la base de datos que viene desde model/conexionBD.php
    require_once '../../model/conexionBD.php';

    // Recibo las variables globales que el usuario coloco en el formulario de login y las guardo para compararlas despues.
    $form_email = $_POST["email"];
    $form_password = $_POST["pass"];


    if (
        empty($form_email) || # los dos palitos indican O
        empty($form_password)
    ) {
        echo "Debes llenar los 2 campos para ingresar a la pagina";
    }

    // validacion del login y redirigir al inicio

    // try para la consulta de bd
    try {
        $sql = "SELECT correo, contrasena
                FROM usuarios
                WHERE correo = :correo LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":correo", $form_email);
        $stmt->execute();

        // aca la variable para ir guardando los campos de BD y acceder a ellos luego
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // verifico que el usuario exista
        if ($usuario) {

            // comparacion de que existe
            if (password_verify($form_password, $usuario["contrasena"])) {
                header("Location: ../../view/dashboard.php");
                exit;
            } else {
                echo "contrasena incorrecta";
            }
        } else {
            echo "usuario no encontrado";
        }
    } catch (PDOException $e) {
        echo "Error al registrar: " . $e->getMessage();
    }
}
