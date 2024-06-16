<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../estilos/estiloFormulario.css" rel="stylesheet">
    <link href="../estilos/estiloProyecto.css" rel="stylesheet">
    <title>Confirmacion de Registro</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top nav-border">
        <div class="container">
            <img src="../imagenes/menu/logotipo_ipn.png" alt="Logo_IPN" title="Logo IPN" width="70" height="70">
            <a class="navbar-brand me-auto" href="../index.html">Programa de tutorías</a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Programa de tutorías</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active mx-lg-2" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">PDF</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="../formulario.html" class="login-button">Registro</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


    <div class="row" style="margin-top: 100px; max-width: 100%;">

        <div class="col-3">

        </div>

        <div class="col-6">
            <h1>Confirma tus datos</h1>
        </div>

        <div class="col-3">

        </div>

        <br>

    </div>
    <br>
    <div class="row" style="max-width: 100%;">
        <div class="col-3">

        </div>

        <div class="col-6" style="border: 2px solid #999; border-radius: 5px; margin: 3px;">
        <form action="Datos.php" method="post" name="DatosConfirmados" id="DatosConfirmados">
        <?php
        // Obtener los valores de la URL
        $boleta =$_POST["boleta"];
        $nombre = $_POST["nombre"];
        $ApPaterno = $_POST["ApPaterno"];
        $ApMaterno = $_POST["ApMaterno"];
        $telefono = $_POST["telefono"];
        $Semestre = $_POST["Semestre"];
        $carrera = $_POST["carrera"];
        $Sexo = $_POST["Sexo"];
        $correo = $_POST["correo"];
        $contraseña = $_POST["contraseña"];
        ?>

        <div class="row mb-3">
            <div class="col-sm-4">
                <label for="boleta" class="col-sm-12 col-form-label">Número de boleta:</label>
            </div>
            <div class="col-sm-8">
                <input value="<?php echo $boleta; ?>" class="form-control" type="text" aria-label="Disabled input example" name="boleta" readonly>    
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4">
                <label for="nombre" class="col-sm-12 col-form-label">Nombre:</label>
            </div>
            <div class="col-sm-8">
                <input value="<?php echo $nombre; ?>" class="form-control" type="text" aria-label="Disabled input example" name="nombre" readonly>    
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4">
                <label for="ApPaterno" class="col-sm-12 col-form-label">Apellido Paterno:</label>
            </div>
            <div class="col-sm-8">
                <input value="<?php echo $ApPaterno; ?>" class="form-control" type="text" aria-label="Disabled input example" name="ApPaterno" readonly>    
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4">
                <label for="ApMaterno" class="col-sm-12 col-form-label">Apellido Materno:</label>
            </div>
            <div class="col-sm-8">
                <input value="<?php echo $ApMaterno; ?>" class="form-control" type="text" aria-label="Disabled input example" name="ApMaterno" readonly>    
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4">
                <label for="telefono" class="col-sm-12 col-form-label">Teléfono:</label>
            </div>
            <div class="col-sm-8">
                <input value="<?php echo $telefono; ?>" class="form-control" type="text" aria-label="Disabled input example" name="telefono" readonly>    
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4">
                <label for="Semestre" class="col-sm-12 col-form-label">Semestre que cursa:</label>
            </div>
            <div class="col-sm-8">
                <input value="<?php echo $Semestre; ?>" class="form-control" type="text" aria-label="Disabled input example" name="semestre" readonly>    
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4">
                <label for="carrera" class="col-sm-12 col-form-label">Carrera:</label>
            </div>
            <div class="col-sm-8">
                <input value="<?php echo $carrera; ?>" class="form-control" type="text" aria-label="Disabled input example" name="carrera" readonly>    
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-5">
                <label for="Sexo" class="col-sm-12 col-form-label">Prefiere que su tutor sea:</label>
            </div>
            <div class="col-sm-7">
                <input value="<?php echo $Sexo; ?>" class="form-control" type="text" aria-label="Disabled input example" name="sexo" readonly>    
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4">
                <label for="correo" class="col-sm-12 col-form-label">Correo Institucional:</label>
            </div>
            <div class="col-sm-8">
                <input value="<?php echo $correo; ?>@alumno.ipn.mx" class="form-control" type="text" aria-label="Disabled input example" name="correo" readonly>    
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4">
                <label for="contraseña" class="col-sm-12 col-form-label">Contraseña:</label>
            </div>
            <div class="col-sm-8">
                <input value="<?php echo $contraseña; ?>" class="form-control" type="text" aria-label="Disabled input example" name="contraseña" readonly>    
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <button class="btn btn-primary" type="submit">Enviar Datos</button>
            </div>
            <div class="col">
                <a href="previous_page.php" class="btn btn-secondary">Regresar</a>
            </div>
        </div>   

    </form>
        </div>

        <div class="col-3">

        </div>

    </div>

    <br>
    <footer class="text-light pt-4 pb-2" style="background-color: #07472d;">
        <div class="container">
            <div class="row">
                <!-- Columna para la imagen -->
                <div class="col-md-6">
                    <img src="../imagenes/footer.png" alt="Secretaría de Educación Pública" class="img-fluid">
                    <p><a href="https://www.gob.mx/sep" class="fas fa-globe mr-3">www.gob.mx/SEP/</a></p>
                </div>

                <!-- Columna para el texto -->
                <div class="col-md-6 text-center text-md-left">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Instituto Politécnico Nacional</h5>
                    <p>D.R. Instituto Politécnico Nacional (IPN). Av. Luis Enrique Erro S/N, Unidad Profesional Adolfo
                        López Mateos, Zacatenco, Delegación Gustavo A. Madero, C.P. 07738, Ciudad de México 2009-2013.
                    </p>
                    <p>Esta página es una obra intelectual protegida por la Ley Federal del Derecho de Autor, puede ser
                        reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y
                        su dirección electrónica; su uso para otros fines, requiere autorización previa y por escrito de
                        la Dirección General del Instituto.</p>
                </div>
            </div>

            <hr class="mb-4">

            <div class="row" style="text-align: center;">
                <div class="col-md-12">
                    <p>© 2024 Derechos Reservados:
                        <a href="https://www.ipn.mx/" style="text-decoration: none;">
                            <strong>Instituto Politécnico Nacional</strong>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('DatosConfirmados').addEventListener('submit', function(event) {
            alert('Registro finalizado');
        });
    </script>
    
</body>
</html>