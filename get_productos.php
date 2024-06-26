<?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "foodmatch";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Consulta SQL
    $sql = "SELECT usuarios.nombre AS vendedor_nombre, usuarios.apellido AS vendedor_apellido, productos.nombre AS producto_nombre, productos.precio, productos.descripcion
            FROM productos
            INNER JOIN usuarios ON productos.id_vendedor = usuarios.id_usuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Salida de los datos de cada fila
        while($row = $result->fetch_assoc()) {
            echo '<div class="vendedor">';
            echo '<h2>Vendedor: ' . $row["vendedor_nombre"] . ' ' . $row["vendedor_apellido"] . '</h2>';
            echo '<div class="producto">';
            echo '<img src="placeholder.png" alt="Imagen del producto">'; // Usa una imagen de marcador de posición
            echo '<div class="detalles">';
            echo '<p>Producto: ' . $row["producto_nombre"] . '</p>';
            echo '<p>Precio: $' . $row["precio"] . '</p>';
            echo '<p>Descripción: ' . $row["descripcion"] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "0 resultados";
    }
    $conn->close();
    ?>