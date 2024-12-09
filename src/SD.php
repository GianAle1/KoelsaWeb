<?php
// Iniciar la sesión
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Gian Alejandro">
    <meta name="keywords" content="Sistema Koelsa Peru">
    <meta name="description" content="Sistema Koelsa Peru S.R.L., soluciones industriales avanzadas para el sector energético y más.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Koelsa Peru S.R.L.</title>
    <link rel="icon" href="views/image/koelsa.png" type="image/png">
</head>
<body>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="views/image/carrusel1.jpg" class="d-block w-100" alt="Imagen 1 del carrusel">
            </div>
            <div class="carousel-item">
                <img src="views/image/carrusel2.jpg" class="d-block w-100" alt="Imagen 2 del carrusel">
            </div>
            <div class="carousel-item">
                <img src="views/image/carrusel3.jpg" class="d-block w-100" alt="Imagen 3 del carrusel">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
    <nav class="navbar navbar-expand-md bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <a class="navbar-brand" href="#"><img src="views/image/koelsa.png" width="50" alt="Logo de la Web"></a>
                <ul class="navbar-nav d-flex justify-content-center align-items-center">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="views/nosotros.php">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Maasdsa</a></li>
                </ul>
                
                <!-- Opciones de autenticación -->
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- Mostrar el botón de Cerrar Sesión si el usuario ha iniciado sesión -->
                        <li class="nav-item"><a class="nav-link" href="index.php?controller=Usuario&action=logout">Cerrar Sesión</a></li>
                    <?php else: ?>
                        <!-- Mostrar el botón de Iniciar Sesión si el usuario no ha iniciado sesión -->
                        <li class="nav-item"><a class="nav-link" href="views/login.php">Iniciar Sesión</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
