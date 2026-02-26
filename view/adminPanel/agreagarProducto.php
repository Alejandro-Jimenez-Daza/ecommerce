<?php
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