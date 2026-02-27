<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/index.css">

</head>

<body>

    <div class="container-fluid p-0">
        <div class="row g-0 min-vh-100">

            <!-- Panel izquierdo: imagen + branding -->
            <div class="col-md-6 panel-izquierdo d-none d-md-flex">
                <img src="resources/images/1.svg" alt="Ilustración de inicio de sesión">
                <p class="tagline">
                    Tu tienda, a un click.
                    <span>Gestiona productos, usuarios y ventas desde un solo lugar.</span>
                </p>
            </div>

            <!-- Panel derecho: formulario -->
            <div class="col-md-6 panel-derecho">
                <div style="max-width: 400px; margin: 0 auto; width: 100%;">

                    <div class="logo-texto">e<span>commerce</span></div>

                    <h1 class="form-titulo">Bienvenido de nuevo</h1>
                    <p class="form-subtitulo">Ingresa tus credenciales para continuar</p>

                    <form action="controller/login/loginController.php" method="post">

                        <div class="mb-3">
                            <label class="form-label-custom">Correo electrónico</label>
                            <input
                                type="email"
                                class="input-custom"
                                placeholder="ejemplo@gmail.com"
                                name="email"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-custom">Contraseña</label>
                            <input
                                type="password"
                                class="input-custom"
                                placeholder="••••••••"
                                name="pass"
                                required>
                        </div>

                        <button type="submit" class="btn-entrar">Entrar</button>

                        <div class="divider">o</div>

                        <p class="link-registro">
                            ¿No tienes cuenta? <a href="view/crearCuenta.php">Crea una aquí</a>
                        </p>

                    </form>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>