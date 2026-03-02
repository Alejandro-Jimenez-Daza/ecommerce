<?php
require_once __DIR__ . '/../config/auth.php';
require_once('../model/conexionBD.php');

$id_detalle = $_GET["id_detalle"];

if (empty($id_detalle)) {
    echo "Hubo un error, no se pasó el ID correctamente";
}

try {
    $sql = "SELECT * FROM productos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id_detalle);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    include __DIR__ . '/navbar.php';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlspecialchars($producto['nombre_producto']) ?> — Detalle</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../resources/css/detalleProducto.css"> <!--recordar link, no a -->
    </head>

    <body>

        <div class="container py-5">

            <!-- Breadcrumb -->
            <div class="breadcrumb-custom">
                <a href="dashboard.php">Inicio</a>
                <i class="bi bi-chevron-right mx-1" style="font-size:0.7rem;"></i>
                <span><?= htmlspecialchars($producto['nombre_producto']) ?></span>
            </div>

            <div class="row g-5 align-items-start">

                <!-- Imagen -->
                <div class="col-12 col-md-6">
                    <div class="img-panel">
                        <span class="badge-nuevo">Nuevo</span>
                        <img src="../resources/static/<?= $producto['imagen']; ?>"
                            alt="<?= htmlspecialchars($producto['nombre_producto']); ?>">
                    </div>
                </div>

                <!-- Info -->
                <div class="col-12 col-md-6">
                    <div class="info-panel">

                        <p class="categoria-label"><i class="bi bi-tag me-1"></i> Producto</p>

                        <h1 class="producto-nombre"><?= htmlspecialchars($producto['nombre_producto']); ?></h1>

                        <p class="producto-descripcion"><?= htmlspecialchars($producto['descripcion']); ?></p>

                        <div class="divider"></div>

                        <!-- Stock -->
                        <div class="stock-badge">
                            <i class="bi bi-check-circle-fill"></i>
                            <?= $producto['stock'] ?> unidades disponibles
                        </div>

                        <!-- Precio -->
                        <div class="precio-wrapper">
                            <span class="precio-principal">
                                $<?= number_format($producto['precio'], 0, ',', '.') ?>
                            </span>
                            <span class="precio-moneda">COP</span>
                        </div>

                        <!-- Botones -->
                        <div class="acciones mb-4">
                            <button class="btn-comprar">
                                <i class="bi bi-lightning-charge me-1"></i> Comprar ahora
                            </button>
                            <button class="btn-carrito" title="Agregar al carrito">
                                <i class="bi bi-cart-plus"></i>
                            </button>
                        </div>

                        <div class="divider"></div>

                        <!-- Volver -->
                        <a href="dashboard.php" class="btn-volver">
                            <i class="bi bi-arrow-left"></i> Volver al catálogo
                        </a>

                    </div>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} catch (PDOException $e) {
    echo "error: " . $e->getMessage();
}
?>