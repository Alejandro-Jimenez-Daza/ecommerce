<?php


// verifico que el metodo haya sido post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // me conecto a la base de datos
    require_once '../../model/conexionBD.php';

    // guardo las variables enviadas al formulario y verifico que no esten vacias
    $reg_producto = trim($_POST["producto"]);
    $reg_descripcion = trim($_POST["descripcion"]);
    $reg_precio = trim($_POST["precio"]);
    $reg_stock = trim($_POST["stock"]);


    // extraigo nombre del archivo
    $nombre_archivo = basename($_FILES["nombre_imagen"]["name"]);



    // anido el if vara ver si las variables son null, isset devuelve true o false
    // verifico si las variables no estan vacias
    // cambiar isset por empty, isset solo mira si la variable esta creada, pero empty detecta vacios
    if (isset($reg_producto) && isset($reg_descripcion) && isset($reg_precio) && isset($reg_stock) && isset($nombre_archivo)) {


        // try para la consulta de bd
        try {
            $sql = "INSERT INTO productos
                    (nombre_producto, precio, stock, imagen, descripcion)
                    VALUES
                    (:producto, :precio, :stock, :imagen, :descripcion)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":producto", $reg_producto);
            $stmt->bindParam(":precio", $reg_precio);
            $stmt->bindParam(":stock", $reg_stock);
            $stmt->bindParam(":imagen", $nombre_archivo);
            $stmt->bindParam(":descripcion", $reg_descripcion);
            $stmt->execute();

            $directorio = '../../resources/static';


            //uno la ruta para guardarlo en disco
            $ruta_final = $directorio . '/' . $nombre_archivo;


            // verifico que la carpeta exista antes de insertar, sino digo que se cree y doy permisos.
            if (!is_dir($directorio)) {
                mkdir($directorio, 0755, true);
            }


            // aca muevo la imagen para guardarla en el fichero que defini en $directorio
            if (move_uploaded_file($_FILES["nombre_imagen"]["tmp_name"], $ruta_final)) {
                // echo "se ha subido con exito";
                header('Location: ../../view/adminPanel/productosPanel.php');
                exit;
            } else {
                echo "Error al subir el archivo.";
            }
        } catch (PDOException $e) {
            echo "Error al registrar: " . $e->getMessage();
        }
    } else {
        echo "debes llenar los campos marcados con *";
    }
} else {
    echo 'error del formulario';
}
