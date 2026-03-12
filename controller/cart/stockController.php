<?php

// funcion para restar el stock
function restarStock($pdo, $id_producto, $cantidad)
{
    $sql = "UPDATE productos SET stock = stock - :cantidad
    WHERE id = :id_producto AND stock >= :cantidad";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
    $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
    $stmt->execute();
}
