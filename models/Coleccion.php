<?php
// MODELO de colecciones.
require_once __DIR__ . '/../config/conexion.php';

function listarColecciones($conexion) {
    return $conexion->query('SELECT * FROM colecciones')->fetchAll(PDO::FETCH_ASSOC);
}
