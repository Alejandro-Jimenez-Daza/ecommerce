<?php
require_once __DIR__ . '/../../config/auth.php';

require_once __DIR__ . '/../../config/auth_admin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../resources/css/usuariosAdmin.css">
</head>

<body class="bg-light">

    <?php include __DIR__ . '/../navbar.php'; ?>

    <div class="container py-5">

        <!-- Encabezado de sección -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="fw-semibold mb-0">Usuarios</h5>
                <p class="text-muted small mb-0">Listado de todos los usuarios activos en la plataforma</p>
            </div>
        </div>

        <!-- Tabla -->
        <div class="bg-white rounded-3 border overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 small">
                    <thead class="border-bottom bg-light">
                        <tr class="text-uppercase text-muted" style="font-size: 0.7rem; letter-spacing: 0.05em;">
                            <th class="ps-4 py-3 fw-semibold">#</th>
                            <th class="py-3 fw-semibold">Nombre</th>
                            <th class="py-3 fw-semibold">Apellido</th>
                            <th class="py-3 fw-semibold">Rol</th>
                            <th class="py-3 fw-semibold">Correo</th>
                            <th class="py-3 fw-semibold">Nacimiento (A-M-D)</th>
                            <th class="py-3 fw-semibold">Sexo</th>
                            <th class="py-3 fw-semibold">Creado</th>
                            <th class="py-3 fw-semibold text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../../model/conexionBD.php';

                        try {
                            $sql = "SELECT * FROM usuarios WHERE activo = 1";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();

                            while ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $id_usuario         = $usuario['id'];
                                $nombre_usuario     = $usuario['nombre'];
                                $apellido_usuario   = $usuario['apellido'];
                                $rol_usuario        = $usuario['rol'];
                                $correo_usuario     = $usuario['correo'];
                                $fecha_naci_usuario = $usuario['fecha_nacimiento'];
                                $sexo_usuario       = $usuario['sexo'];
                                $creado_en_usuario  = $usuario['creado_en'];
                        ?>
                                <tr>
                                    <td class="ps-4 text-muted"><?= $id_usuario ?></td>

                                    <!-- Avatar inicial + nombre -->
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center fw-semibold"
                                                style="width:32px; height:32px; font-size:0.8rem;">
                                                <?= strtoupper(mb_substr($nombre_usuario, 0, 1)) ?>
                                            </div>
                                            <?= htmlspecialchars($nombre_usuario) ?>
                                        </div>
                                    </td>

                                    <td><?= htmlspecialchars($apellido_usuario) ?></td>

                                    <!-- Badge de rol con color según tipo -->
                                    <td>
                                        <?php
                                        $badge = match (strtolower($rol_usuario)) {
                                            'admin'  => 'bg-danger-subtle text-danger',
                                            'editor' => 'bg-warning-subtle text-warning',
                                            default  => 'bg-primary-subtle text-primary'
                                        };
                                        ?>
                                        <span class="badge rounded-pill <?= $badge ?> fw-medium">
                                            <?= htmlspecialchars($rol_usuario) ?>
                                        </span>
                                    </td>

                                    <td class="text-muted"><?= htmlspecialchars($correo_usuario) ?></td>
                                    <td class="text-muted"><?= $fecha_naci_usuario ?></td>
                                    <td class="text-muted"><?= htmlspecialchars($sexo_usuario) ?></td>
                                    <td class="text-muted"><?= $creado_en_usuario ?></td>

                                    <td class="text-end pe-4">
                                        <form action="../../controller/admin/deleteUserController.php" method="post"
                                            onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                                            <input type="hidden" name="id_borrar" value="<?= $id_usuario ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-danger action-btn" title="Eliminar">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        } catch (PDOException $e) {
                            echo "<tr><td colspan='9' class='text-center text-danger py-4'>Error: " . $e->getMessage() . "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Footer de la tabla -->
            <div class="border-top px-4 py-3 d-flex justify-content-between align-items-center bg-light">
                <span class="text-muted small">Mostrando usuarios activos</span>
                <span class="text-muted small">Ecommerce Admin &middot; 2025</span>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>