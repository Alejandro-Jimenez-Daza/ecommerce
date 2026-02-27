<?php
session_start();
if (!isset($_SESSION["id"])) {
    header('Location: /ecommerce/index.php');
    exit;
}

if ($_SESSION["rol"] !== 'adm') {
    header('Location: /ecommerce/view/dashboard.php');
    exit;
}
