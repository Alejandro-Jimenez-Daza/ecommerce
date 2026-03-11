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
    <style>
        * {
            font-family: 'Sora', sans-serif;
        }

        body {
            background: #f5f5f5;
        }

        .page-hero {
            text-align: center;
            padding: 3rem 1rem 2rem;
        }

        .page-hero img {
            width: 220px;
            margin-bottom: 1.5rem;
        }

        .page-hero h1 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a1a1a;
        }

        .page-hero h1 span {
            color: #f97316;
        }

        .page-hero p {
            color: #9ca3af;
            font-size: 0.9rem;
            max-width: 520px;
            margin: 0.5rem auto 0;
        }

        .nosotros-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #f0f0f0;
            padding: 2rem;
            max-width: 680px;
            margin: 0 auto 3rem;
        }

        .nosotros-card p {
            color: #6b7280;
            font-size: 0.9rem;
            line-height: 1.8;
            margin-bottom: 1.2rem;
        }

        .nosotros-card p:last-child {
            margin-bottom: 0;
        }

        .valores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .valor-item {
            background: #fafafa;
            border: 1px solid #f0f0f0;
            border-radius: 12px;
            padding: 1.2rem 1rem;
            text-align: center;
        }

        .valor-item i {
            font-size: 1.5rem;
            color: #f97316;
            margin-bottom: 0.6rem;
            display: block;
        }

        .valor-item strong {
            display: block;
            font-size: 0.85rem;
            color: #1a1a1a;
            font-weight: 600;
            margin-bottom: 0.3rem;
        }

        .valor-item span {
            font-size: 0.78rem;
            color: #9ca3af;
        }

        .seccion-titulo {
            font-size: 1rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 0.8rem;
        }

        .seccion-titulo span {
            color: #f97316;
        }

        .divider {
            height: 1px;
            background: #f0f0f0;
            margin: 1.5rem 0;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="container">

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