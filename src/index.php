<?php
// Iniciar sesión si no está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluir el modelo de Usuario
require_once 'models/Usuario.php';

// Verificar si el formulario de login ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';

    // Instanciar el modelo de Usuario
    $usuario = new Usuario();

    // Verificar las credenciales
    if ($usuario->verificarUsuario($correo, $contraseña)) {
        // Si las credenciales son correctas, redirigir al menú
        header("Location: views/menu.php");
        exit();
    } else {
        // Si las credenciales son incorrectas, mostrar un mensaje
        $error = "Credenciales incorrectas.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    
    <!-- Mostrar el mensaje de error si es necesario -->
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <!-- Formulario de Login -->
    <form method="POST" action="index.php">
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required>
        <br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required>
        <br>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
