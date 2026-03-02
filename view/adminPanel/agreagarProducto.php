<?php<?php

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

require_once __DIR__ . '/../../config/auth_admin.php';



include __DIR__ . '/../navbar.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar producto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                <div class="card shadow-sm border-0 rounded-4">

                    <div class="card-body p-4">

                        <h3 class="mb-4 text-center fw-bold">Agregar producto</h3>

                        <form action="../../controller/admin/addProductController.php"
                            enctype="multipart/form-data"
                            method="post">

                            <!-- Producto -->
                            <div class="mb-3">
                                <label class="form-label">Nombre del producto</label>
                                <input type="text"
                                    name="producto"
                                    class="form-control"
                                    required>
                            </div>

                            <!-- Descripción -->
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea name="descripcion"
                                    class="form-control"
                                    rows="3"
                                    required></textarea>
                            </div>

                            <!-- Precio -->
                            <div class="mb-3">
                                <label class="form-label">Precio (COP)</label>
                                <input type="number"
                                    name="precio"
                                    class="form-control"
                                    min="0"
                                    step="0.01"
                                    required>
                            </div>

                            <!-- Stock -->
                            <div class="mb-3">
                                <label class="form-label">Stock</label>
                                <input type="number"
                                    name="stock"
                                    class="form-control"
                                    min="0"
                                    required>
                            </div>

                            <!-- Imagen -->
                            <div class="mb-4">
                                <label class="form-label">Imagen del producto</label>
                                <input type="file"
                                    name="nombre_imagen"
                                    class="form-control"
                                    accept="image/*"
                                    required>
                            </div>

                            <!-- Botones -->
                            <div class="d-flex justify-content-between">
                                <a href="productosPanel.php"
                                    class="btn btn-outline-secondary">
                                    Cancelar
                                </a>

                                <button type="submit"
                                    class="btn btn-success px-4">
                                    Guardar producto
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>