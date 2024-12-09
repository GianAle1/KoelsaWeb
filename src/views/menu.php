<!-- src/views/menu.php -->
<?php
session_start();
if (!isset($_SESSION['user'])) {
    // Si no hay una sesión activa, redirige al login
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user']; // Obtiene los datos del usuario desde la sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
</head>
<body>

<h2>Bienvenido, <?= htmlspecialchars($user['nombre']) ?>!</h2>
<p>Email: <?= htmlspecialchars($user['correo']) ?></p>
<p>Apellidos: <?= htmlspecialchars($user['apellidos']) ?></p>

<a href="logout.php">Cerrar sesión</a>

</body>
</html>
