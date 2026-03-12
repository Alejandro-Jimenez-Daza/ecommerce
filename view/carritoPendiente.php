<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago pendiente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../resources/css/carritoPendiente.css">

</head>

<body>
    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="container">



        <div class="page-hero">
            <img src="<?= BASE_URL ?>/resources/images/8.svg" alt="Pago pendiente">
            <h1>Pago <span>pendiente</span></h1>
            <p>Tu orden fue registrada. Solo falta completar el pago en el punto habilitado.</p>
        </div>

        <div class="estado-card">

            <div class="icono-estado">
                <i class="bi bi-clock-fill"></i>
            </div>
            <p class="estado-titulo">Esperando tu pago</p>
            <p class="estado-desc">
                Generaste una orden de pago en efectivo. Sigue estos pasos para completarla:
            </p>

            <div class="pasos">
                <div class="paso-item">
                    <span class="paso-num">1</span>
                    <span>Dirígete a un punto de pago habilitado — Efecty, Baloto o similar.</span>
                </div>
                <div class="paso-item">
                    <span class="paso-num">2</span>
                    <span>Presenta el código o cupón que te envió Mercado Pago por correo.</span>
                </div>
                <div class="paso-item">
                    <span class="paso-num">3</span>
                    <span>Una vez confirmado el pago, recibirás un correo con la confirmación de tu orden.</span>
                </div>
            </div>

            <a href="<?= BASE_URL ?>/view/dashboard.php" class="btn-inicio">
                <i class="bi bi-house me-1"></i> Volver al inicio
            </a>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>