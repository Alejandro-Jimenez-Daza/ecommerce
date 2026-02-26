<?php

// verifico que el metodo haya sido post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // me conecto a la base de datos
    require_once('../../model/conexionBD.php');

    // guardo las variables enviadas al formulario y verifico que no esten vacias
    $edit_id = $_POST["id"];
    $edit_producto = trim($_POST["producto"]);
    $edit_descripcion = trim($_POST["descripcion"]);
    $edit_precio = trim($_POST["precio"]);
    $edit_stock = trim($_POST["stock"]);
    $imagen_actual = $_POST["imagen_actual"];

    if (
        empty($edit_id)
    ) {
        echo "Hubo un error, no se paso el ID correctamente";
    }

    //    logica para la variable de imagen, si la imagen no cambia, se conserva el input hidden con el nombre de imagen anterior
    if (!empty($_FILES['imagen_nueva']['name'])) {

        $nombre_imagen_sin_date = basename($_FILES["imagen_nueva"]['name']);
        #asi ya se guarda en la bd, pero recordar que tambien debe guardarse en disco sino la imagen se ve rota.

        // establezco la hora de colombia PARA IDENTIFICAR LA IMAGEN COMO UNINCA
        date_default_timezone_set('America/Bogota');
        $horaColombia = date('Y-m-d.H:i');

        $nombre_imagen = $horaColombia . '_' . $nombre_imagen_sin_date;

        $ruta_temporal = $_FILES['imagen_nueva']['tmp_name'];
        $directorio_destino = '../../resources/static/' . $nombre_imagen;

        // muevo la imagen, 
        //“Oye PHP, mueve el archivo desde donde lo guardaste temporalmente, hacia mi carpeta definitiva.”
        move_uploaded_file($ruta_temporal, $directorio_destino);
    } else {
        $nombre_imagen = $imagen_actual;
    }

    // try para la consulta de bd
    try {
        $sql = "UPDATE productos SET nombre_producto = :producto, precio = :precio, stock = :stock, imagen = :url_img, descripcion = :descripcion
         WHERE id = :id ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $edit_id);
        $stmt->bindParam(":producto", $edit_producto);
        $stmt->bindParam(":precio", $edit_precio);
        $stmt->bindParam(":stock", $edit_stock);
        $stmt->bindParam(":url_img", $nombre_imagen);
        $stmt->bindParam(":descripcion", $edit_descripcion);

        $stmt->execute();

        if ($stmt->rowCount() >= 1) {
            header("Location: ../../view/adminPanel/productosPanel.php");
            exit;
        } else {
            echo "No se actualizaron los campos";
        }
    } catch (PDOException $e) {
        echo "Error try al editar: " . $e->getMessage();
    }
} else {
    echo "El formulario no se edito correctamente";
}

// Cuando subes un archivo, PHP crea algo así:

// $_FILES['imagen_nueva'] = [
//     'name' => 'foto.png',        // nombre original
//     'type' => 'image/png',
//     'tmp_name' => '/tmp/phpY7sd9', // archivo temporal REAL
//     'error' => 0,
//     'size' => 24567
// ];