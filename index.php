<?php
require_once "recursos/rutas.php";
require_once "recursos/estructura.php";
require_once "recursos/conexion.php";
if (isset($_GET["controlador"]) && isset($_GET["accion"])) {
    $controlador = $_GET["controlador"];
    $accion = $_GET["accion"];
} else {
    $controlador = "inicio";
    $accion = "index";
}
rutas::cargarContenido($controlador, $accion);
require_once "recursos/estructura.php";
// echo "$controlador - $accion";
?>
