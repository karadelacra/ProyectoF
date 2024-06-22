<?php
// Incluir archivo de conexión
include('php/conexion.php');


// Recibir datos del formulario
$nombre = $_POST['firstName'];
$apellido = $_POST['lastName'];
$nombre_usuario = $_POST['username'];
$numero_boleta = $_POST['nBoleta'];
$correo = $_POST['email'];
$password = $_POST['password'];
$hora_inicio = $_POST['horaInicio'];
$hora_fin = $_POST['horaFin'];
$tarjeta = $_POST['cc-name'];
$clabe_interbancaria = $_POST['cc-number'];
$telefono = $_POST['nTelefono'];

// Preparar consulta SQL para insertar datos en la tabla Usuarios
$sql = "INSERT INTO Usuarios (nombre, apellido, username, num_boleta, correo, contraseña, horario_inicio, horario_fin, tarjeta, clabe_interbancaria, telefono) 
            VALUES ('$nombre', '$apellido', '$nombre_usuario', '$numero_boleta', '$correo', '$password', '$hora_inicio', '$hora_fin', '$tarjeta', '$clabe_interbancaria', '$telefono')";

if ($conexion->query($sql) === TRUE) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar conexión
$conexion->close();

?>
