<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../resources/css/productosAdmin.css">
</head>

<body class="bg-light">

    <?php include __DIR__ . '/../navbar.php'; ?>

    <div class="container py-5">

        <!-- Encabezado de sección -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="fw-semibold mb-0">Productos</h5>
                <p class="text-muted small mb-0">Listado de todos los productos disponibles en la plataforma</p>
            </div>
            <a href="agreagarProducto.php" class="btn btn-primary btn-sm px-3">
                <i class="bi bi-plus-square me-1"></i> Agregar producto
            </a>
        </div>

        <!-- Tabla -->
        <div class="bg-white rounded-3 border overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 ">
                    <thead class="border-bottom bg-light">
                        <tr class="text-uppercase text-muted" style="font-size: 0.7rem; letter-spacing: 0.05em;">
                            <th class="ps-4 py-3 fw-semibold">#</th>
                            <th class="py-3 fw-semibold">Nombre</th>
                            <th class="py-3 fw-semibold">Descripción</th>
                            <th class="py-3 fw-semibold">Precio</th>
                            <th class="py-3 fw-semibold">Stock</th>
                            <th class="py-3 fw-semibold">Imagen</th>
                            <th class="py-3 fw-semibold text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../../model/conexionBD.php';

                        try {
                            $sql = "SELECT * FROM productos";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $ruta_relativa = '../../resources/static/';

                            while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                $id_prod          = $producto['id'];
                                $nombre_prod      = $producto['nombre_producto'];
                                $descripcion_prod = $producto['descripcion'];
                                $precio_prod      = $producto['precio'];
                                $stock_prod       = $producto['stock'];
                                $url_img          = $producto['imagen'];
                        ?>
                                <tr>
                                    <td class="ps-4 text-muted"><?= $id_prod ?></td>

                                    <td class="fw-medium"><?= htmlspecialchars($nombre_prod) ?></td>

                                    <td class="text-muted" style="max-width: 220px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                                        title="<?= htmlspecialchars($descripcion_prod) ?>">
                                        <?= htmlspecialchars($descripcion_prod) ?>
                                    </td>

                                    <td>
                                        <span class="badge bg-success-subtle text-success fw-medium rounded-pill">
                                            $<?= number_format($precio_prod, 0, ',', '.') ?> COP
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge rounded-pill <?= $stock_prod > 0 ? 'bg-primary-subtle text-primary' : 'bg-danger-subtle text-danger' ?> fw-medium">
                                            <?= $stock_prod ?> uds.
                                        </span>
                                    </td>

                                    <td>
                                        <img class="rounded-2 border"
                                            style="width: 70px; height: 70px; object-fit: contain;"
                                            src="<?= $ruta_relativa . $url_img ?>"
                                            alt="Imagen del producto">
                                    </td>

                                    <td class="text-end pe-4">
                                        <div class="d-flex justify-content-end gap-2">

                                            <a href="editarProducto.php?id_editar=<?= $id_prod ?>" class="btn btn-sm btn-outline-primary action-btn">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="../../controller/admin/deleteProductController.php" method="post"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
                                                <input type="hidden" name="id_borrar" value="<?= $id_prod ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger action-btn">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                        <?php
                            }
                        } catch (PDOException $e) {
                            echo "<tr><td colspan='7' class='text-center text-danger py-4'>Error: " . $e->getMessage() . "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Footer de la tabla -->
            <div class="border-top px-4 py-3 d-flex justify-content-between align-items-center bg-light">
                <span class="text-muted small">Mostrando todos los productos</span>
                <span class="text-muted small">Ecommerce Admin &middot; 2025</span>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>