<?php
// CONTROLADOR de la pagina principal.
require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../models/Coleccion.php';
require_once __DIR__ . '/../models/Contacto.php';

// Si llega el formulario de contacto por POST, lo guarda y va a gracias
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    guardarContacto($conexion, $_POST);
    header('Location: gracias.php');
    exit;
}

// Si llega ?buscar=algo por GET, filtra los productos
$buscar = trim($_GET['buscar'] ?? '');

$productos = listarProductos($conexion, $buscar);
$colecciones = listarColecciones($conexion);

require __DIR__ . '/../views/home.php';
