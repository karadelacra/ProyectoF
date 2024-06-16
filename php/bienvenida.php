<?php
session_start();

if (!isset($_SESSION['boleta'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
</head>
<body>
    <h2>Bienvenido</h2>
    <p>Has iniciado sesión con la boleta: <?php echo $_SESSION['boleta']; ?></p>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>
