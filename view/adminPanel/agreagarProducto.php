<?php

include __DIR__ . '/../navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar productos</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>


    <h1>agregar producto</h1>

    <div class="containter">
        <div>
            <form action="../../controller/admin/addProductController.php" enctype="multipart/form-data" method="post">

                <div>
                    <label for="">Producto: </label>
                    <input type="text" name="producto">
                </div>

                <div>
                    <label for="">Descripcion: </label>
                    <input type="text" name="descripcion">
                </div>

                <div>
                    <label for="">Precio: </label>
                    <input type="number" name="precio">
                </div>

                <div>
                    <label for="">Stock: </label>
                    <input type="number" name="stock">
                </div>

                <div>
                    <label for="">Imagen: </label>
                    <input type="file" name="nombre_imagen">
                </div>

                <button type="submit" class="btn btn-success">Agregar</button>

            </form>
            <a href="productosPanel.php">
                <button class="btn btn-danger">Cancelar</button>
            </a>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>