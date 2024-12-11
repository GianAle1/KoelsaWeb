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

    <!-- Incluir Bootstrap 5 CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Contenedor principal -->
    <div class="container mt-5">

        <!-- Título -->
        <h2 class="text-center mb-4">Registrar Proveedor</h2>

        <!-- Mostrar error si ocurre alguno -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <!-- Formulario de registro -->
        <form method="POST" action="register_proveedor.php">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono">
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">Registrar</button>
            </div>
        </form>

        <!-- Enlace para ver los proveedores -->
        <div class="mt-3 text-center">
            <a href="view_proveedores.php" class="btn btn-secondary">Ver Proveedores</a>
        </div>

    </div>

    <!-- Incluir Bootstrap JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
