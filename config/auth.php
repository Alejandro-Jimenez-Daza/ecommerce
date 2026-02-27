<?php
// para las sesiones, se inicia sesiony se valida
session_start();


if (!isset($_SESSION['id'])) {
    header('Location:  /ecommerce/index.php');
    exit;
}
