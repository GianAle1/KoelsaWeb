<?php
// Incluir el modelo de Proveedor
require_once '../models/Proveedor.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $correo = $_POST['correo'] ?? '';

    // Crear una instancia del modelo Proveedor
    $proveedor = new Proveedor();

    // Registrar el proveedor
    if ($proveedor->registrarProveedor($nombre, $direccion, $telefono, $correo)) {
        // Si el proveedor se registra correctamente, redirigir
        header("Location: view_proveedores.php");
        exit();
    } else {
        // Si hubo un error, mostrar mensaje
        $error = "Error al registrar proveedor.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Proveedor</title>
</head>
<body>
    <h2>Registrar Proveedor</h2>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="register_proveedor.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion">
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono">
        <br>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo">
        <br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
