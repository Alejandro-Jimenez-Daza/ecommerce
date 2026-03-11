<?php


require_once __DIR__ . '/../model/conexionBD.php';

// si la variable pasa algo que se convierta a entero, para q no manipule la url con deicmales, y si no, que sea 1 el valor
$pagina = isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;

// registro por pagina de tabla
$regPagina = 10;

// si estamos en la pagina 2, por registor por pagina que es 10, 20 menos 10 = 10, empieza desde el registro 10 en la pagina 2, y asi con las demas
$inicio = ($pagina > 1) ? (($pagina * $regPagina) - $regPagina) : 0;

$registros = $pdo->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM productos 
                            LIMIT $inicio, $regPagina");

$registros->execute();
$registro = $registros->fetchAll();

$totalRegistros = $pdo->query("SELECT FOUND_ROWS() as total");
$totalRegistros = $totalRegistros->fetch()['total'];

// redondear la pagina hacia abajo para que quepa la cantidad de regsitros, por ejemplo 3,1, deberian dar 4 paginas
$numeroPaginas = ceil($totalRegistros / $regPagina);
