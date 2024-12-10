<?php
// Verificar si el usuario está logueado
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");  // Redirigir al login si no está logueado
    exit();
}

// Obtener los datos del usuario desde la sesión
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Barra de navegación con fondo oscuro (bg-dark) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Koelsa Peru S.R.L.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Marcas Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarMarca" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Marcas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarMarca">
                        <a class="dropdown-item" href="registrarMarca.php">Registrar marca</a>
                        <a class="dropdown-item" href="verMarcas.php">Ver marcas</a>
                    </div>
                </li>

                <!-- Proveedores Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarProveedor" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Proveedores
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarProveedor">
                        <a class="dropdown-item" href="register_proveedor.php">Registrar proveedor</a>
                        <a class="dropdown-item" href="view_proveedores.php">Ver proveedores</a>
                    </div>
                </li>

                <!-- Productos Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarProducto" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Productos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarProducto">
                        <a class="dropdown-item" href="crear_producto.php">Registrar producto</a>
                        <a class="dropdown-item" href="ver_productos.php">Ver productos</a>
                        <a class="dropdown-item" href="actualizar_producto.php">Actualizar producto</a>
                        <a class="dropdown-item" href="eliminar_producto.php">Eliminar producto</a>
                    </div>
                </li>

                <!-- Cerrar sesión -->
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- Contenido principal -->
    <div class="container mt-5">
        <div class="card p-4">
            <h2 class="card-title">Bienvenido, <?php echo $usuario['nombre'] . ' ' . $usuario['apellidos']; ?></h2>
            <p class="card-text">Correo: <?php echo $usuario['correo']; ?></p>
        </div>
    </div>

    <!-- Bootstrap 5 JS y Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
