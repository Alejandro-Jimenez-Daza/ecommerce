<?php

// aca llamo la conexion a la base de datos que viene desde model/conexionBD.php
require_once '../../model/conexionBD.php';

// luego recibo las variables globales que el usuario coloco en el formulario
$form_email = $_POST["email"];
$form_password = $_POST["pass"];


