<?php

// verifico que el metodo haya sido post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // me conecto a la base de datos
    require_once '../../model/conexionBD.php';

    // guardo las variables enviadas al formulario y verifico que no esten vacias
    $reg_nombre = trim($_POST["nombres"]);
    $reg_apellido = trim($_POST["apellidos"]);
    $reg_email = trim($_POST["email"]);
    $reg_pass = trim($_POST["pass"]);
    $reg_f_nacimiento = $_POST["f_nacimiento"];
    $reg_sexo = $_POST["sexo"];



    // anido el if vara ver si las variables son null, isset devuelve true o false
    // verifico si las variables no estan vacias
    // cambiar isset por empty, isset solo mira si la variable esta creada, pero empty detecta vacios
    if (isset($reg_nombre) && isset($reg_apellido) && isset($reg_email) && isset($reg_pass) && isset($reg_sexo)) {

        // hasheo la contrasena antes del insert en BD
        $pass_hasheada = password_hash($reg_pass, PASSWORD_DEFAULT);

        // try para la consulta de bd
        try {
            $sql = "INSERT INTO usuarios
                    (nombre, apellido, correo, contrasena, fecha_nacimiento, sexo)
                    VALUES
                    (:nombre, :apellido, :correo, :contrasena, :fecha_nacimiento, :sexo)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":nombre", $reg_nombre);
            $stmt->bindParam(":apellido", $reg_apellido);
            $stmt->bindParam(":correo", $reg_email);
            $stmt->bindParam(":contrasena", $pass_hasheada);
            $stmt->bindParam(":fecha_nacimiento", $reg_f_nacimiento);
            $stmt->bindParam(":sexo", $reg_sexo);

            $stmt->execute();

            // echo "usuario registrado exitosamente, ya puedes iniciar sesion."; para verificar

            header('Location: ../../index.php');
            exit;
        } catch (PDOException $e) {
            echo "Error al registrar: " . $e->getMessage();
        }
    } else {
        echo "debes llenar los campos marcados con *";
    }
} else {
    echo 'error del formulario';
}
