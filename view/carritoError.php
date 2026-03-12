<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error en el pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="../resources/css/carritoError.css">
</head>

<body>
    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="container">

        <div class="pt-4">
            <a href="<?= BASE_URL ?>/view/dashboard.php" class="btn btn-dark btn-sm rounded-pill px-3">
                <i class="bi bi-arrow-left me-1"></i> Volver al inicio
            </a>
        </div>

        <div class="page-hero">
            <img src="<?= BASE_URL ?>/resources/images/7.svg" alt="Error en el pago">
            <h1>Algo salió <span>mal</span></h1>
            <p>No pudimos procesar tu pago. No te preocupes, no se realizó ningún cobro.</p>
        </div>

        <div class="estado-card">
            <div class="icono-estado">
                <i class="bi bi-x-circle-fill"></i>
            </div>
            <p class="estado-titulo">Pago rechazado</p>
            <p class="estado-desc">
                Tu pago no pudo completarse. Esto puede deberse a fondos insuficientes,
                datos incorrectos o una restricción de tu banco. Puedes intentarlo de nuevo.
            </p>
            <a href="<?= BASE_URL ?>/view/miCarrito.php" class="btn-reintentar">
                <i class="bi bi-arrow-clockwise me-1"></i> Intentar de nuevo
            </a>
            <a href="<?= BASE_URL ?>/view/dashboard.php" class="btn-volver">
                Volver al catálogo
            </a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>