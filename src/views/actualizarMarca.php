<?php
include_once '../controllers/MarcaController.php';

// Verificar si los datos de la marca están disponibles
if (isset($marcaData) && !empty($marcaData)) :
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Marca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2>Editar Marca</h2>

        <!-- Formulario para actualizar la marca -->
        <form action="../controllers/MarcaController.php" method="POST">
            <input type="hidden" name="action" value="editar">
            <input type="hidden" name="idmarca" value="<?php echo $marcaData['idmarca']; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Marca:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $marcaData['nombre']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="verMarcas.php" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
else:
    echo "Marca no encontrada.";
endif;
?>
