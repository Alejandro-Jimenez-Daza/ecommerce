<?php
require_once __DIR__ . '    /../config/config.php'; // sube dos niveles


?>

<!-- en este codigo html se puede decir que creo un COMPONENTE, el cual es el navbar para llamarlo al inicio de las demas vistas y no repetir codigo -->
<style>
    :root {
        --color-primario: #3e72ff;
        --fuente-principal: 'Arial', sans-serif;
        --espaciado-base: 16px;
    }

    #color-nav {
        background-color: var(--color-primario);
    }
</style>

<!-- icons de bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg bg-body-tertiary p-0">
    <div class="container-fluid pb-3" id="color-nav">
        <a class="navbar-brand text-white" href="<?= BASE_URL ?>/view/dashboard.php">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <?php if ($_SESSION['rol'] === 'adm'): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin panel
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= BASE_URL ?>/view/adminPanel/productosPanel.php"><i class="bi bi-box2 me-2"></i> Productos</a></li>
                            <li><a class="dropdown-item" href="<?= BASE_URL ?>/view/adminPanel/usuariosPanel.php"><i class="bi bi-people me-2"></i> Usuarios</a></li>

                        </ul>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Contacto</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bienvenido, <?= $_SESSION['nombre'] ?>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- BASE URL GENERALMENTE DEVUELVE LA RAIZ DE MI PROYECTO, MAS FACIL PARA PORTABILIDAD Y APUNTAR MEJOR -->
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/controller/login/logOutController.php">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> -->