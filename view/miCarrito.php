<?php
require_once __DIR__ . '/../config/auth.php'; // auth no auth_admin, cualquier usuario puede tener carrito
require_once __DIR__ . '/../config/config.php';

$arrayIdProductos = $_SESSION["carrito"] ?? []; // ?? [] evita error si no existe

$ids = array_keys($arrayIdProductos);

if (empty($ids)) {
    // carrito vacío — redirige o muestra mensaje
    // header("Location: dashboard.php"); // opción 1
    // opción 2: dejarlo caer al HTML y mostrar estado vacío
}

$productos = [];

if (!empty($ids)) {
    require_once __DIR__ . '/../model/conexionBD.php';

    $placeholders = [];
    foreach ($ids as $i => $id) {
        $placeholders[] = ":id$i";
    }
    $inString = implode(",", $placeholders);

    try {
        $sql = "SELECT * FROM productos WHERE id IN ($inString)";
        $stmt = $pdo->prepare($sql);

        foreach ($ids as $i => $id) {
            $stmt->bindValue(":id$i", $id, PDO::PARAM_INT);
        }

        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetchAll guarda TODOS en un array

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

include __DIR__ . '/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Sora', sans-serif;
        }

        body {
            background: #f5f5f5;
        }

        .carrito-titulo {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1a1a1a;
        }

        .carrito-titulo span {
            color: #f97316;
        }

        .tabla-carrito {
            background: white;
            border-radius: 16px;
            border: 1px solid #f0f0f0;
            overflow: hidden;
        }

        .tabla-carrito table {
            margin: 0;
        }

        .tabla-carrito thead tr {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #9ca3af;
            background: #fafafa;
            border-bottom: 1px solid #f0f0f0;
        }

        .img-carrito {
            width: 56px;
            height: 56px;
            object-fit: contain;
            border-radius: 8px;
            border: 1px solid #f0f0f0;
            background: #fafafa;
            padding: 4px;
        }

        .nombre-prod {
            font-weight: 600;
            font-size: 0.88rem;
            color: #1a1a1a;
        }

        .precio-unit {
            color: #6b7280;
            font-size: 0.85rem;
        }

        .subtotal {
            font-weight: 700;
            color: #f97316;
            font-size: 0.95rem;
        }

        /* Panel resumen */
        .resumen-panel {
            background: white;
            border-radius: 16px;
            border: 1px solid #f0f0f0;
            padding: 1.5rem;
        }

        .resumen-titulo {
            font-weight: 700;
            font-size: 1rem;
            color: #1a1a1a;
            margin-bottom: 1rem;
        }

        .resumen-fila {
            display: flex;
            justify-content: space-between;
            font-size: 0.88rem;
            color: #6b7280;
            margin-bottom: 0.6rem;
        }

        .resumen-total {
            display: flex;
            justify-content: space-between;
            font-weight: 700;
            font-size: 1.1rem;
            color: #1a1a1a;
            border-top: 1px solid #f0f0f0;
            padding-top: 0.8rem;
            margin-top: 0.8rem;
        }

        .resumen-total span:last-child {
            color: #f97316;
        }

        .btn-pagar {
            background: #1a1a1a;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.8rem;
            width: 100%;
            font-weight: 600;
            font-size: 0.9rem;
            font-family: 'Sora', sans-serif;
            transition: background 0.2s;
            margin-top: 1rem;
        }

        .btn-pagar:hover {
            background: #f97316;
            color: white;
        }

        .btn-seguir {
            display: block;
            text-align: center;
            color: #6b7280;
            font-size: 0.82rem;
            text-decoration: none;
            margin-top: 0.8rem;
            transition: color 0.2s;
        }

        .btn-seguir:hover {
            color: #f97316;
        }

        /* Estado vacío */
        .carrito-vacio {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 16px;
            border: 1px solid #f0f0f0;
        }

        .carrito-vacio i {
            font-size: 3rem;
            color: #e5e7eb;
            margin-bottom: 1rem;
        }

        .carrito-vacio p {
            color: #9ca3af;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="carrito-titulo mb-0">Mi <span>carrito</span></h1>
            <a href="dashboard.php" class="text-muted small text-decoration-none">
                <i class="bi bi-arrow-left me-1"></i> Seguir comprando
            </a>
        </div>

        <?php if (empty($productos)): ?>

            <!-- Carrito vacío -->
            <div class="carrito-vacio">
                <i class="bi bi-cart-x"></i>
                <h5 class="fw-semibold mb-2">Tu carrito está vacío</h5>
                <p>Agrega productos desde el catálogo para verlos aquí.</p>
                <a href="dashboard.php" class="btn-pagar d-inline-block" style="width:auto; padding: 0.7rem 2rem;">
                    Ver productos
                </a>
            </div>

        <?php else: ?>

            <div class="row g-4 align-items-start">

                <!-- Tabla de productos -->
                <div class="col-12 col-lg-8">
                    <div class="tabla-carrito">
                        <table class="table align-middle mb-0 small">
                            <thead>
                                <tr>
                                    <th class="ps-4 py-3">Producto</th>
                                    <th class="py-3">Precio unit.</th>
                                    <th class="py-3">Cantidad</th>
                                    <th class="py-3">Subtotal</th>
                                    <th class="py-3 pe-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($productos as $producto):
                                    $id_prod  = $producto['id'];
                                    $cantidad = $arrayIdProductos[$id_prod]; // cantidad viene de la sesión
                                    $subtotal = $producto['precio'] * $cantidad;
                                    $total   += $subtotal;
                                ?>
                                    <tr>
                                        <td class="ps-4 py-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="../resources/static/<?= $producto['imagen'] ?>"
                                                    class="img-carrito"
                                                    alt="<?= htmlspecialchars($producto['nombre_producto']) ?>">
                                                <span class="nombre-prod"><?= htmlspecialchars($producto['nombre_producto']) ?></span>
                                            </div>
                                        </td>
                                        <td class="precio-unit">$<?= number_format($producto['precio'], 0, ',', '.') ?> COP</td>
                                        <td>
                                            <!-- botones + y - — los conectaremos al back después -->
                                            <div class="d-flex align-items-center gap-2">
                                                <button class="btn btn-sm btn-outline-secondary px-2 py-0">−</button>
                                                <span class="fw-semibold"><?= $cantidad ?></span>
                                                <button class="btn btn-sm btn-outline-secondary px-2 py-0">+</button>
                                            </div>
                                        </td>
                                        <td class="subtotal">$<?= number_format($subtotal, 0, ',', '.') ?> COP</td>
                                        <td class="pe-4">
                                            <button class="btn btn-sm btn-outline-danger" title="Eliminar">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Resumen -->
                <div class="col-12 col-lg-4">
                    <div class="resumen-panel">
                        <p class="resumen-titulo">Resumen del pedido</p>
                        <div class="resumen-fila">
                            <span>Subtotal</span>
                            <span>$<?= number_format($total, 0, ',', '.') ?> COP</span>
                        </div>
                        <div class="resumen-fila">
                            <span>Envío</span>
                            <span class="text-success">Gratis</span>
                        </div>
                        <div class="resumen-total">
                            <span>Total</span>
                            <span>$<?= number_format($total, 0, ',', '.') ?> COP</span>
                        </div>
                        <button class="btn-pagar">
                            <i class="bi bi-lock me-1"></i> Proceder al pago
                        </button>
                        <a href="dashboard.php" class="btn-seguir">
                            ← Seguir comprando
                        </a>
                    </div>
                </div>

            </div>

        <?php endif; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>