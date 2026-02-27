<?php
// protejo las vistas con sesion
require_once('../config/auth.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../resources/css/dashboard.css">
</head>

<body>

    <!-- aca coloco el navbar -->
    <?php

    // para la ruta fija de el navbar
    // define('BASE_URL', '/ecommerce');
    require_once __DIR__ . '/../config/config.php'; // sube dos niveles
    require_once BASE_PATH . '/view/navbar.php';

    ?>


    <!-- contenido y tarjetas para los productos, aca ciclo el bucle de los productos -->
    <div class=" py-5">
        <div class="container">
            <h2 class="text-center mb-5 text-dark fw-bold">Productos recientes</h2>

            <div class="row g-4">

                <?php
                require_once '../model/conexionBD.php';

                try {
                    $sql = "SELECT nombre_producto, descripcion, precio, imagen FROM productos";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();

                    $ruta_relativa = '../resources/static/';

                    while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {

                        $nombre_producto = $producto['nombre_producto'];
                        $descripcion_producto = $producto['descripcion'];
                        $precio = $producto['precio'];
                        $url_img = $producto['imagen'];
                ?>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm border-0">

                                <img src="<?= $ruta_relativa . $url_img ?>"
                                    class="card-img-top img-fluid p-3"
                                    style="height:220px; object-fit:contain;"
                                    alt="Producto">

                                <div class="card-body d-flex flex-column">

                                    <h5 class="card-title"><?= $nombre_producto ?></h5>

                                    <p class="card-text text-muted small flex-grow-1">
                                        <?= $descripcion_producto ?>
                                    </p>

                                    <div class="mt-auto">
                                        <p class="fw-bold fs-5 mb-3">
                                            $<?= number_format($precio, 0, ',', '.') ?> COP
                                        </p>

                                        <a href="#" class="btn btn-primary w-100">
                                            Comprar
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>

                <?php
                    }
                } catch (PDOException $e) {
                    echo "Error en la base de datos: " . $e->getMessage();
                }
                ?>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>