<?php
// para las sesiones, se inicia sesiony se valida, TAMBIEN PONGO EL VERIFICADOR DE SESSION PARA QUE NO DIGA SESSION ALREADY EXIST Y NO SE INICIE 2 VECES.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['id'])) {
    header('Location:  /ecommerce/index.php');
    exit;
}
