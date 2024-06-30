<?php
session_start();

// Incluir archivo de conexión a la base de datos
include 'conexion.php';

// Obtener datos del formulario
$usernameOrEmail = $_POST['username'];
$password = $_POST['password'];

// Consulta SQL para buscar usuario por nombre de usuario o correo electrónico
$sql = "SELECT * FROM usuarios WHERE username = '$usernameOrEmail' OR correo = '$usernameOrEmail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verificar la contraseña
    if (password_verify($password, $row['contraseña'])) {
        // Contraseña correcta, iniciar sesión
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $row['username']; // Utilizar el nombre de usuario real desde la base de datos
        $_SESSION['user_id'] = $row['id']; // También puedes almacenar el ID del usuario para referencia
        
        // Establecer una cookie para mantener la sesión iniciada (opcional)
        setcookie("loggedin", true, time() + (86400 * 30), "/"); // 86400 = 1 día
        
        // Redirigir a otra página después del inicio de sesión exitoso
        header("Location: Intento2\LOGGG.html");
        exit;
    } else {
        // Contraseña incorrecta
        $_SESSION['login_error'] = "Usuario o contraseña correcta ";
        header("Location: \ProyectoF\Intento2\LOGGG.html");
        exit;
    }
} else {
    // Usuario no encontrado, redirigir de nuevo a la página de inicio de sesión con un mensaje de error
    $_SESSION['login_error'] = "Usuario o contraseña incorrectos";
    header("Location: /Signin.html");
    exit;
}

// Cerrar conexión
$conn->close();
?>
