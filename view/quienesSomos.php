<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiénes somos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="../resources/css/sobreNosotros.css">
</head>

<body>
    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="container">

        <!-- botón volver -->
        <div class="pt-4">
            <a href="<?= BASE_URL ?>/view/dashboard.php"
                class="btn btn-dark btn-sm rounded-pill px-3">
                <i class="bi bi-arrow-left me-1"></i> Volver al inicio
            </a>
        </div>

        <!-- Hero con imagen -->
        <div class="page-hero">
            <img src="<?= BASE_URL ?>/resources/images/5.svg" alt="Quiénes somos">
            <h1>Sobre <span>nosotros</span></h1>
            <p>Somos un equipo apasionado por conectar personas con los mejores productos del mercado.</p>
        </div>

        <!-- Card principal -->
        <div class="nosotros-card">

            <p class="seccion-titulo">¿Quiénes <span>somos?</span></p>
            <p>
                Somos una tienda online nacida con la misión de ofrecer productos de calidad
                a precios justos. Creemos que comprar por internet debe ser simple, seguro
                y confiable.
            </p>
            <p>
                Desde nuestros inicios hemos trabajado para construir una plataforma donde
                cada cliente se sienta respaldado en cada paso de su compra, desde elegir
                el producto hasta recibirlo en su puerta.
            </p>

            <div class="divider"></div>

            <p class="seccion-titulo">Nuestros <span>valores</span></p>

            <div class="valores-grid">
                <div class="valor-item">
                    <i class="bi bi-shield-check"></i>
                    <strong>Confianza</strong>
                    <span>Pagos seguros y datos protegidos</span>
                </div>
                <div class="valor-item">
                    <i class="bi bi-stars"></i>
                    <strong>Calidad</strong>
                    <span>Productos verificados y garantizados</span>
                </div>
                <div class="valor-item">
                    <i class="bi bi-headset"></i>
                    <strong>Soporte</strong>
                    <span>Atención al cliente siempre disponible</span>
                </div>
                <div class="valor-item">
                    <i class="bi bi-lightning-charge"></i>
                    <strong>Rapidez</strong>
                    <span>Envíos ágiles a todo el país</span>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>