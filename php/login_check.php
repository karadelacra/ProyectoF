<?php
session_start();

// Aquí deberías incluir la lógica para verificar las credenciales del administrador.
// Por ejemplo, comparando el nombre de usuario y la contraseña con los valores correctos en una base de datos.

$username = "admin"; // Nombre de usuario correcto
$password = "admin"; // Contraseña correcta

if ($_POST["username"] === $username && $_POST["password"] === $password) {
    // Si las credenciales son correctas, establece una sesión y redirige al usuario a la interfaz de administrador.
    $_SESSION["admin"] = true;
    header("Location: admin_interface.php");
    exit;
} else {
    // Si las credenciales son incorrectas, redirige al usuario nuevamente a la página de inicio de sesión.
    header("Location: loginAdmin.html");
    exit;
}
?>
