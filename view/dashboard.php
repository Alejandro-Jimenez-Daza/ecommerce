<?php
require_once('../config/auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../resources/css/dashboard.css">

</head>

<body>

    <?php
    require_once __DIR__ . '/../config/config.php';
    require_once BASE_PATH . '/view/navbar.php';
    ?>

    <!-- Hero -->
    <div class="hero-banner">
        <div class="container">
            <h1>Los mejores productos<br><span>al mejor precio.</span></h1>
            <p>Encuentra todo lo que necesitas en un solo lugar.</p>
        </div>
    </div>

    <!-- Catálogo -->
    <div class="container pb-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="seccion-titulo mb-0">Productos <span>recientes</span></h2>
            <span class="text-muted small">Mostrando todos los productos</span>
        </div>

        <div class="row g-4">
            <?php
            require_once '../model/conexionBD.php';
            try {
                $sql = "SELECT nombre_producto, descripcion, precio, imagen FROM productos";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $ruta_relativa = '../resources/static/';

                while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $nombre_producto      = $producto['nombre_producto'];
                    $descripcion_producto = $producto['descripcion'];
                    $precio               = $producto['precio'];
                    $url_img              = $producto['imagen'];
            ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card-producto">

                            <div class="img-wrapper">
                                <span class="badge-nuevo">Nuevo</span>
                                <img src="<?= $ruta_relativa . $url_img ?>" alt="<?= htmlspecialchars($nombre_producto) ?>">
                            </div>

                            <div class="card-body-custom">
                                <p class="card-nombre"><?= htmlspecialchars($nombre_producto) ?></p>
                                <p class="card-descripcion"><?= htmlspecialchars($descripcion_producto) ?></p>

                                <div class="precio-wrapper">
                                    <span class="precio-principal">$<?= number_format($precio, 0, ',', '.') ?></span>
                                    <span class="precio-moneda">COP</span>
                                </div>

                                <div class="acciones">
                                    <button class="btn-comprar">Comprar</button>
                                    <button class="btn-carrito" title="Agregar al carrito">
                                        <i class="bi bi-cart-plus"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
            <?php
                }
            } catch (PDOException $e) {
                echo "<p class='text-danger'>Error en la base de datos: " . $e->getMessage() . "</p>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>