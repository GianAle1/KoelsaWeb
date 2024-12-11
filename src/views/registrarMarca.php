<!-- views/registrarMarca.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Marca</title>

    <!-- Incluir Bootstrap 5 CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Contenedor principal -->
    <div class="container mt-5">

        <!-- Título -->
        <h2 class="text-center mb-4">Registrar Nueva Marca</h2>

        <!-- Formulario de registro -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Marca:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary w-100">Registrar</button>
        </form>

        <!-- Enlace para ver todas las marcas -->
        <div class="mt-3 text-center">
            <a href="verMarcas.php" class="btn btn-secondary">Ver todas las marcas</a>
        </div>

    </div>

    <!-- Incluir Bootstrap JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
