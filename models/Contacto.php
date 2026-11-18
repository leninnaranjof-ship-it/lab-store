<?php
// MODELO de contactos. Aqui esta el CRUD completo.
require_once __DIR__ . '/../config/conexion.php';

// CREATE
function guardarContacto($conexion, $datos) {
    $sql = 'INSERT INTO contactos (nombre, correo, mensaje) VALUES (?, ?, ?)';
    $conexion->prepare($sql)->execute([
        $datos['nombre'], $datos['correo'], $datos['mensaje'],
    ]);
}

// READ (todos)
function listarContactos($conexion) {
    return $conexion->query('SELECT * FROM contactos ORDER BY id DESC')
                    ->fetchAll(PDO::FETCH_ASSOC);
}

// READ (uno solo)
function buscarContacto($conexion, $id) {
    $consulta = $conexion->prepare('SELECT * FROM contactos WHERE id = ?');
    $consulta->execute([$id]);
    return $consulta->fetch(PDO::FETCH_ASSOC);
}

// UPDATE
function actualizarContacto($conexion, $datos) {
    $sql = 'UPDATE contactos SET nombre = ?, correo = ?, mensaje = ? WHERE id = ?';
    $conexion->prepare($sql)->execute([
        $datos['nombre'], $datos['correo'], $datos['mensaje'], $datos['id'],
    ]);
}

// DELETE
function eliminarContacto($conexion, $id) {
    $conexion->prepare('DELETE FROM contactos WHERE id = ?')->execute([$id]);
}
