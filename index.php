<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>

    <!-- ESTE DOCUMENTO CONTIENE EL FORMULARIO DE LOGIN A LA PAGINA WEB DE ECOMMERCE. -->

    <div class="container">

        <div class="bg-info">

            <!-- formulario de ingreso de sesion a la plataforma -->
            <form action="controller/login/loginController.php" method="post">

                <!-- entrada del correo -->
                <div id="email">
                    <label for="">correo electronico</label> <br>
                    <input type="email" placeholder="ejemplo@gmail.com" name="email" required>
                </div>

                <!-- entrada de la clave -->
                <div id="password">
                    <label for="" class="mt-3">contrasena</label> <br>
                    <input type="password" placeholder="●●●●●●●●" name="pass" required>
                </div>

                <button class="btn btn-success mt-3" type="submit">Entrar</button><br>

                <p>NO tienes cuenta? <a href="view/crearCuenta.php">cree una</a></p>


            </form>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>