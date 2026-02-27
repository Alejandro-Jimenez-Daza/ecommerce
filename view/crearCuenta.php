<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../resources/css/registro.css">

</head>

<body>

    <div class="container-fluid p-0">
        <div class="row g-0 min-vh-100">

            <!-- Panel izquierdo -->
            <div class="col-md-5 panel-izquierdo d-none d-md-flex">
                <img src="../resources/images/2.svg" alt="Ilustración registro">
                <p class="tagline">
                    Únete a <span>ecommerce</span>
                    <small>Crea tu cuenta y empieza a comprar hoy.</small>
                </p>
            </div>

            <!-- Panel derecho: formulario -->
            <div class="col-md-7 panel-derecho">
                <div style="max-width: 480px; margin: 0 auto; width: 100%;">

                    <div class="logo-texto">e<span>commerce</span></div>

                    <h1 class="form-titulo">Crear cuenta</h1>
                    <p class="form-subtitulo">Completa los datos para registrarte</p>

                    <form action="../controller/register/registroController.php" method="post">

                        <!-- Nombres y apellidos en fila -->
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label class="form-label-custom">Nombres</label>
                                <input type="text" class="input-custom" placeholder="Juan" name="nombres" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label-custom">Apellidos</label>
                                <input type="text" class="input-custom" placeholder="Pérez" name="apellidos">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">Correo electrónico</label>
                            <input type="email" class="input-custom" placeholder="ejemplo@gmail.com" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">Contraseña</label>
                            <input type="password" class="input-custom" placeholder="••••••••" name="pass" required>
                        </div>

                        <!-- Fecha y sexo en fila -->
                        <div class="row g-3 mb-4">
                            <div class="col-7">
                                <label class="form-label-custom">Fecha de nacimiento</label>
                                <input type="date" class="input-custom" name="f_nacimiento">
                            </div>
                            <div class="col-5">
                                <label class="form-label-custom">Sexo</label>
                                <select name="sexo" class="input-custom" required>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn-registrar">Crear cuenta</button>

                        <p class="link-login">
                            ¿Ya tienes cuenta? <a href="../index.php">Inicia sesión</a>
                        </p>

                    </form>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>