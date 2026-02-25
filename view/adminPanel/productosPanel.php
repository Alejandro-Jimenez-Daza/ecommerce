<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../resources/css/productosAdmin.css">
    <!-- Iconos de bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

    <?php
    include __DIR__ . '/../navbar.php';


    ?>

    <div class="container">

        <div class="container-fluid">

            <a href="crudProductos.php">
                <button class="btn btn-info">Agregar producto</button>
            </a>
            <table class="table">
                <thead>


                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // llamo la conexion a la base de datos
                    require_once '../../model/conexionBD.php';

                    try {
                        $sql = "SELECT * FROM productos";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $ruta_relativa = '../../resources/static/';

                        // aca la variable para ir guardando los campos de BD y acceder a ellos luego
                        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {

                            // guardo en varibales
                            $id_prod = $producto['id'];
                            $nombre_prod = $producto['nombre_producto'];
                            $descripcion_prod = $producto['descripcion'];
                            $precio_prod = $producto['precio'];
                            $stock_prod = $producto['stock'];
                            $url_img = $producto['imagen'];

                    ?>
                            <tr>
                                <th scope="row"><?= $id_prod ?></th>
                                <td scope="row"><?= $nombre_prod ?></td>
                                <td scope="row"><?= $descripcion_prod ?></td>
                                <td scope="row"><?= $precio_prod ?></td>
                                <td scope="row"><?= $stock_prod ?></td>
                                <td scope="row"><img class="img-thumbnail" id="img-prod" src="<?= $ruta_relativa . $url_img ?>" alt="Imagen del producto"></td>
                                <!-- Botones de accion para editar y eliminar, pasar el id Para procesar -->
                                <td scope="row" class="fuente-iconos">
                                    <a href="">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    } catch (PDOException $e) {
                        echo "Error en la base de datos: " . $e->getMessage();
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>