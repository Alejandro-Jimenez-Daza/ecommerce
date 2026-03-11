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
    <!-- css -->
    <link rel="stylesheet" href="../resources/css/contacto.css">
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