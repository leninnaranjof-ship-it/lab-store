<?php
// conexion.php: datos para conectarse a la base de datos con PDO
$host = 'localhost';
$base = 'lab';
$usuario = 'root';
$clave = ''; // en XAMPP root no tiene contraseña

$conexion = new PDO(
    "mysql:host=$host;dbname=$base;charset=utf8mb4",
    $usuario,
    $clave,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
