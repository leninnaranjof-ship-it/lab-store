<?php
// MODELO de productos. Solo habla con la base de datos.
require_once __DIR__ . '/../config/conexion.php';

// Si llega una palabra para buscar, filtra. Si no, trae todos.
function listarProductos($conexion, $buscar = '') {
    if ($buscar !== '') {
        $consulta = $conexion->prepare('SELECT * FROM productos WHERE nombre LIKE ?');
        $consulta->execute(['%' . $buscar . '%']);
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    return $conexion->query('SELECT * FROM productos')->fetchAll(PDO::FETCH_ASSOC);
}
