<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
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
            max-width: 480px;
            margin: 0.5rem auto 0;
        }

        .contacto-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #f0f0f0;
            padding: 2rem;
            max-width: 560px;
            margin: 0 auto 3rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #f5f5f5;
            font-size: 0.9rem;
            color: #6b7280;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-item i {
            font-size: 1.2rem;
            color: #f97316;
            width: 24px;
            text-align: center;
        }

        .info-item strong {
            display: block;
            color: #1a1a1a;
            font-size: 0.85rem;
            margin-bottom: 2px;
        }

        .form-label {
            font-size: 0.82rem;
            font-weight: 600;
            color: #1a1a1a;
        }

        .form-control {
            border-radius: 10px;
            border: 1.5px solid #f0f0f0;
            font-size: 0.88rem;
            font-family: 'Sora', sans-serif;
            padding: 0.65rem 1rem;
        }

        .form-control:focus {
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
        }

        .btn-enviar {
            background: #1a1a1a;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.75rem;
            width: 100%;
            font-weight: 600;
            font-size: 0.9rem;
            font-family: 'Sora', sans-serif;
            transition: background 0.2s;
            margin-top: 0.5rem;
        }

        .btn-enviar:hover {
            background: #f97316;
            color: white;
        }

        .divider-text {
            text-align: center;
            color: #9ca3af;
            font-size: 0.78rem;
            margin: 1.5rem 0;
            position: relative;
        }

        .divider-text::before,
        .divider-text::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 38%;
            height: 1px;
            background: #f0f0f0;
        }

        .divider-text::before {
            left: 0;
        }

        .divider-text::after {
            right: 0;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="container">

        <!-- Hero con imagen -->
        <div class="page-hero">
            <img src="<?= BASE_URL ?>/resources/images/6.svg" alt="Contacto">
            <h1>¿Tienes alguna <span>pregunta?</span></h1>
            <p>Escríbenos y te responderemos a la brevedad posible.</p>
        </div>

        <!-- Card -->
        <div class="contacto-card">

            <!-- Info de contacto -->
            <div class="mb-3">
                <div class="info-item">
                    <i class="bi bi-envelope-fill"></i>
                    <div>
                        <strong>Correo electrónico</strong>
                        contacto@ecommerce.com
                    </div>
                </div>
                <div class="info-item">
                    <i class="bi bi-whatsapp"></i>
                    <div>
                        <strong>WhatsApp</strong>
                        +57 300 000 0000
                    </div>
                </div>
                <div class="info-item">
                    <i class="bi bi-clock-fill"></i>
                    <div>
                        <strong>Horario de atención</strong>
                        Lunes a viernes — 9:00 am a 6:00 pm
                    </div>
                </div>
            </div>

            <div class="divider-text">o envíanos un mensaje</div>

            <!-- Formulario -->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" placeholder="Tu nombre">
            </div>
            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" placeholder="tu@correo.com">
            </div>
            <div class="mb-3">
                <label class="form-label">Mensaje</label>
                <textarea class="form-control" rows="4" placeholder="¿En qué podemos ayudarte?"></textarea>
            </div>
            <button class="btn-enviar">
                <i class="bi bi-send me-2"></i> Enviar mensaje
            </button>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>