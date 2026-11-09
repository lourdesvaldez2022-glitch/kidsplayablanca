<?php
// Configuración de credenciales de XAMPP
$host = "localhost";
$user = "root";
$password = "";
$database = "kids_club_db";

// Creación de la conexión MySQLi orientada a objetos
$conexion = new mysqli($host, $user, $password, $database);

// Verificación de errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Establecer conjunto de caracteres a UTF-8
$conexion->set_charset("utf8");
?>