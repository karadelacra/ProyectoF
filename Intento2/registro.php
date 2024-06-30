<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Incluir archivo de conexión a la base de datos
    include 'conexion.php';

    $phoneNumber = $_POST['phoneNumber'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    $promotions = $_POST['promotions'];
    $image = $_POST['image'];

    // Procesar y guardar la imagen (se necesita decodificación)
    $image_parts = explode(";base64,", $image);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $file = 'imagenes/' . uniqid() . '.' . $image_type;
    file_put_contents($file, $image_base64);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO productos (telefono, producto, precio, promociones, imagen) VALUES ('$phoneNumber', '$product', '$price', '$promotions', '$file')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo producto agregado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>

