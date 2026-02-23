<?php

// aca llamo la conexion a la base de datos que viene desde model/conexionBD.php
require_once '../../model/conexionBD.php';

// Recibo las variables globales que el usuario coloco en el formulario de login y las guardo para compararlas despues.
$form_email = $_POST["email"];
$form_password = $_POST["pass"];
