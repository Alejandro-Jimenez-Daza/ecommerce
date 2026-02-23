<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">


    <!-- css complementario -->
    <link rel="stylesheet" href="../resources/css/registro.css">
</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-9">
                <img src="../resources/images/2.svg" alt="" class="img-register">
            </div>

            <div class="col-9">
                <h1>crear cuenta</h1>

                <form action="../controller/register/registroController.php" method="post">

                    <label for="">nombres</label><br>
                    <input type="text" name="nombres" required><br>

                    <label for="">apellidos</label><br>
                    <input type="text" name="apellidos"><br>

                    <label for="">correo electronico</label><br>
                    <input type="email" name="email" required><br>

                    <label for="">contrasena</label><br>
                    <input type="password" name="pass" required><br>

                    <label for="">Fecha de nacimiento</label><br>
                    <input type="date" name="f_nacimiento"><br>


                    <label for="sexo">Sexo:</label>
                    <select name="sexo" required>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select><br>

                    <button class="btn btn-info" type="submit">Registrarme</button>


                </form>
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>