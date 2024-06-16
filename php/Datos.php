<?php

        $nombre = $_POST['nombre'];
        $boleta = $_POST['boleta'];
        $ApPaterno = $_POST['ApPaterno'];
        $ApMaterno = $_POST['ApMaterno'];
        $telefono = $_POST['telefono'];
        $semestre = $_POST['semestre'];
        $carrera = $_POST['carrera'];
        $sexo = $_POST['sexo'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        $conexion=mysqli_connect('localhost','root','','programatutorias');

        $consulta = "INSERT INTO alumnosregistrados ( boleta,nombre, ApPaterno, ApMaterno, telefono, semestre, carrera, tutordeseado, correo, contraseña) 
                    VALUES ( '$boleta','$nombre', '$ApPaterno', '$ApMaterno', '$telefono', '$semestre', '$carrera', '$sexo', '$correo', '$contraseña')";
        $resultado = mysqli_query($conexion,$consulta);

        header('Location: ../index.html');
?>
