<?php
session_start();

// Incluir archivo de conexión a la base de datos
include 'conexion.php';

// Obtener datos del formulario
$usernameOrEmail = $_POST['username'];
$password = $_POST['password'];

// Consulta SQL para buscar usuario por nombre de usuario o correo electrónico
$sql = "SELECT * FROM usuarios WHERE (username = '$usernameOrEmail' OR correo = '$usernameOrEmail') AND contraseña = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario encontrado, iniciar sesión
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $usernameOrEmail;

    // Redirigir a otra página después del inicio de sesión exitoso
    header("Location: /index.html");
    exit;
} else {
    // Usuario no encontrado, redirigir de nuevo a la página de inicio de sesión con un mensaje de error
    $_SESSION['login_error'] = "Usuario o contraseña incorrectos";
    header("Location: /Signin.html");
    exit;
}

// Cerrar conexión
$conn->close();
?>