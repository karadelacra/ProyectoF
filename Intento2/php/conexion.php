<?php
$host = "localhost"; // usualmente "localhost" si estás trabajando localmente
$usuario = "root";
$contraseña = "";
$base_de_datos = "foodmatch";

// Crear conexión
$conn = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>