<?php
session_start();
include 'config.php'; // archivo para configurar la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $boleta = $_POST['boleta'];
    $contraseña = $_POST['contraseña'];
    
    // Conectar a la base de datos
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar la consulta
    $sql = "SELECT * FROM alumnosregistrados WHERE boleta = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    $stmt->bind_param("s", $boleta);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Comparar la contraseña en texto plano
        if ($contraseña === $row['contraseña']) {
            // Las credenciales son correctas, iniciar sesión
            $_SESSION['boleta'] = $row['boleta'];
            header("Location: bienvenida.php");
            exit();
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta.";
        }
    } else {
        // Boleta no encontrada
        echo "No se encontró una cuenta con esa boleta.";
    }

    // Cerrar conexión
    $stmt->close();
    $conn->close();
} else {
    echo "Método de solicitud no válido.";
}
?>
