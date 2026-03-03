<?php


// verifico que el metodo haya sido post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // me conecto a la base de datos
    require_once '../../model/conexionBD.php';

    // guardo las variables enviadas al formulario y verifico que no esten vacias
    $reg_producto = trim($_POST["producto"]);

    $reg_descripcion = trim($_POST["descripcion"]);

    $reg_precio = trim($_POST["precio"]); #el precio debo formatearlo bien para que no se guarde mal interpretado como decimal y quede incorrecto
    $reg_precio = str_replace('.', '', $reg_precio);
    $reg_precio = (int)$reg_precio;


    $reg_stock = trim($_POST["stock"]);

    // extraigo nombre del archivo
    $nombre_imagen = basename($_FILES["nombre_imagen"]["name"]);


    // establezco la hora de colombia
    date_default_timezone_set('America/Bogota');
    // agarro la hora actual de colombia
    $horaColombia = date('Y-m-d.H:i');

    // cambio el nombre de la imagen para que siempre sea unica y no haya problemas con otra imagen del mismo nombre, no 
    // coloco segundos ya que los productos solo se agrega por administradores
    $imagen_unica = $horaColombia . '-' . $nombre_imagen;


    // anido el if vara ver si las variables son null, isset devuelve true o false
    // verifico si las variables no estan vacias
    // cambiar isset por empty, isset solo mira si la variable esta creada, pero empty detecta vacios
    if (isset($reg_producto) && isset($reg_descripcion) && isset($reg_precio) && isset($reg_stock) && isset($nombre_imagen)) {


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
            $stmt->bindParam(":imagen", $imagen_unica);
            $stmt->bindParam(":descripcion", $reg_descripcion);
            $stmt->execute();

            $directorio = '../../resources/static';


            //uno la ruta para guardarlo en disco
            $ruta_final = $directorio . '/' . $imagen_unica;


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



// str_replace para formatear el valor del precio y que no se guarde incompleto

//     Sintaxis: str_replace($busqueda, $reemplazo, $cadena_original).
//     Sensibilidad: Distingue entre mayúsculas y minúsculas.
//     Funcionalidad:
//         Texto único: Reemplaza una palabra por otra (ej. cambiar "hola" por "adiós").
//         Arrays: Permite buscar varias palabras y reemplazarlas por un array de nuevos textos correspondiente.
//     Variación: str_ireplace() hace lo mismo pero sin distinguir mayúsculas. 

// Ejemplo:
// php

// $frase = "Hola Mundo";
// $nuevaFrase = str_replace("Mundo", "PHP", $frase);
// // Resultado: "Hola PHP"
