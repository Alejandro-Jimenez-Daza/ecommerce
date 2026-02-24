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

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid pb-3" id="color-nav">
            <a class="navbar-brand text-white" href="#">Ecommerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin panel
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Productos</a></li>
                            <li><a class="dropdown-item" href="#">Usuarios</a></li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Contacto</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User name
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Cerrar sesion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- contenido y tarjetas para los productos, aca ciclo el bucle de los productos -->
    <div class="bg-info">
        <h2 class="text-center">productos recientes</h2>

        <div class="row">

            <!-- para empezar a recorrer llamo a la bd -->


            <?php
            // aca llamo la conexion a la base de datos que viene desde model/conexionBD.php
            require_once '../model/conexionBD.php';

            try {
                $sql = "SELECT nombre_producto, descripcion, precio, imagen
                FROM productos";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                // aca la variable para ir guardando los campos de BD y acceder a ellos luego
                while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    // guardo en varibales
                    $nombre_producto = $producto['nombre_producto'];
                    $descripcion_producto = $producto['descripcion'];
                    $precio = $producto['precio'];
                    $url_img = $producto['imagen'];
            ?>
                    <div class="card" style="width: 18rem;">
                        <img src="../resources/static/bix.jpg" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $nombre_producto ?></h5>
                            <p class="card-text"><?= $descripcion_producto . '.' ?></p>
                            <p>$ <?= $precio ?>COP</p>
                            <a href="#" class="btn btn-primary">Comprar</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>