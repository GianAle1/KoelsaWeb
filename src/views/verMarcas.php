<?php
// Incluir el controlador y el modelo
include_once '../controllers/MarcaController.php';

// Crear una instancia del controlador
$marcaController = new MarcaController();

// Llamar al método para obtener las marcas
$marcas = $marcaController->ver(); // Esto ahora obtiene las marcas correctamente
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Marcas</title>

    <!-- Incluir Bootstrap 5 CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Contenedor principal -->
    <div class="container mt-5">

        <!-- Título -->
        <h2 class="text-center mb-4">Listado de Marcas</h2>

        <!-- Botón para registrar nueva marca -->
        <div class="mb-3 text-end">
            <a href="registrarMarca.php" class="btn btn-primary">Registrar nueva marca</a>
        </div>

        <!-- Verificar si hay marcas -->
        <?php if (!empty($marcas)): ?>
            <!-- Tabla de marcas -->
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($marcas as $marca): ?>
                        <tr>
                            <td><?php echo $marca['idmarca']; ?></td>
                            <td><?php echo $marca['nombre']; ?></td>
                            <td>
                                <!-- Botones de acción -->
                                <a href="../controllers/MarcaController.php?accion=editar&idmarca=<?php echo $marca['idmarca']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="../controllers/MarcaController.php?accion=eliminar&idmarca=<?php echo $marca['idmarca']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                No hay marcas disponibles.
            </div>
        <?php endif; ?>

    </div>

    <!-- Incluir Bootstrap JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
