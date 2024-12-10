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
</head>
<body>
    <h2>Listado de Marcas</h2>
    <a href="registrarMarca.php">Registrar nueva marca</a>
    
    <!-- Verificar si hay marcas -->
    <?php if (!empty($marcas)): ?>
        <table border="1">
            <thead>
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
                            <a href="../controllers/MarcaController.php?accion=editar&idmarca=<?php echo $marca['idmarca']; ?>">Editar</a> |
                            <a href="../controllers/MarcaController.php?accion=eliminar&idmarca=<?php echo $marca['idmarca']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay marcas disponibles.</p>
    <?php endif; ?>
</body>
</html>
