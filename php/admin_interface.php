<?php
session_start();

// Verificar si el usuario ha iniciado sesión como administrador
if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
    // Si no ha iniciado sesión como administrador, redirigirlo a la página de inicio de sesión.
    header("Location: loginAdmin.html");
    exit;
}

// Aquí puedes colocar el contenido de la interfaz de administrador.
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz de administrador</title>
</head>
<body>
    <h2>Bienvenido Administrador</h2>
    <!-- Contenido de la interfaz de administrador aquí -->
    <p>Esta es la interfaz de administrador.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
