<?php
// CONTROLADOR del panel de mensajes (editar y eliminar).
require_once __DIR__ . '/../models/Contacto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'];

    if ($accion === 'actualizar') {
        actualizarContacto($conexion, $_POST);
    }
    if ($accion === 'eliminar') {
        eliminarContacto($conexion, $_POST['id']);
    }

    header('Location: admin.php');
    exit;
}

$contactos = listarContactos($conexion);

// Si la URL trae ?editar=3, cargamos ese mensaje en el formulario (GET)
$editando = null;
if (isset($_GET['editar'])) {
    $editando = buscarContacto($conexion, $_GET['editar']);
}

require __DIR__ . '/../views/admin.php';
