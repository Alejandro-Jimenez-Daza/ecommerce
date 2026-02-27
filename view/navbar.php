<?php
require_once __DIR__ . '/../config/config.php';
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../resources/css/nav.css">

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="<?= BASE_URL ?>/view/dashboard.php">
            e<span>commerce</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list fs-4 text-secondary"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-1">

                <!-- Admin panel — solo para admins -->
                <?php if ($_SESSION['rol'] === 'adm'): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-grid me-1"></i>
                            Admin
                            <span class="badge-admin">admin</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="<?= BASE_URL ?>/view/adminPanel/productosPanel.php">
                                    <i class="bi bi-box2 me-2 text-secondary"></i> Productos
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= BASE_URL ?>/view/adminPanel/usuariosPanel.php">
                                    <i class="bi bi-people me-2 text-secondary"></i> Usuarios
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- Contacto -->
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-envelope me-1"></i> Contacto
                    </a>
                </li>

                <!-- Separador visual en desktop -->
                <li class="d-none d-lg-block" style="width:1px; height:24px; background:#e5e7eb; margin: 0 4px;"></li>

                <!-- Usuario -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">

                        <?= htmlspecialchars($_SESSION['nombre']) ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item text-danger" href="<?= BASE_URL ?>/controller/login/logOutController.php">
                                <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </div>
</nav>