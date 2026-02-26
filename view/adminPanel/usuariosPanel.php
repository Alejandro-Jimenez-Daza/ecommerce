<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../resources/css/usuariosAdmin.css">
</head>

<body>

    <?php
    include __DIR__ . '/../navbar.php';


    ?>

    <div class="container">

        <div class="container-fluid">


            <table class="table table-hover align-middle text-center custom-table mt-5">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Fecha Nacimiento</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Creado en</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    // llamo la conexion a la base de datos
                    require_once '../../model/conexionBD.php';

                    try {
                        $sql = "SELECT * FROM usuarios WHERE activo = 1";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();

                        // aca la variable para ir guardando los campos de BD y acceder a ellos luego
                        while ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {

                            // guardo en varibales
                            $id_usuario = $usuario['id'];
                            $nombre_usuario = $usuario['nombre'];
                            $apellido_usuario = $usuario['apellido'];
                            $rol_usuario = $usuario['rol'];
                            $correo_usuario = $usuario['correo'];
                            $fecha_naci_usuario = $usuario['fecha_nacimiento'];
                            $sexo_usuario = $usuario['sexo'];
                            $creado_en_usuario = $usuario['creado_en'];


                    ?>
                            <tr>
                                <th scope="row"><?= $id_usuario ?></th>
                                <td scope="row"><?= $nombre_usuario ?></td>
                                <td scope="row"><?= $apellido_usuario ?></td>
                                <td scope="row"><?= $rol_usuario ?></td>
                                <td scope="row"><?= $correo_usuario ?></td>
                                <td scope="row"><?= $fecha_naci_usuario ?></td>
                                <td scope="row"><?= $sexo_usuario  ?></td>
                                <td scope="row"><?= $creado_en_usuario ?></td>


                                <!-- Botones de accion para editar y eliminar, pasar el id Para procesar -->
                                <td>
                                    <div class="d-flex justify-content-center gap-2">

                                        <!-- ELIMINAR X  -->
                                        <!-- el button no pasa datos con href, debe ser in unput oculto y value. -->
                                        <form action="../../controller/admin/deleteUserController.php" method="post" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                                            <input type="hidden" name="id_borrar" value="<?= $id_usuario; ?>">
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