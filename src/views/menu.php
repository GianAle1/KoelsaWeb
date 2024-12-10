<?php
// Verificar si el usuario está logueado
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");  // Redirigir al login si no está logueado
    exit();
}

// Obtener los datos del usuario
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $usuario['nombre'] . ' ' . $usuario['apellidos']; ?></h2>
    <p>Correo: <?php echo $usuario['correo']; ?></p>

    <!-- Opciones del menú -->
    <h3>Opciones</h3>
    <ul>
        <li><a href="register_proveedor.php">Registrar proveedor</a></li>
        <li><a href="view_proveedores.php">Ver proveedores</a></li>
    </ul>

    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
