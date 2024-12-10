<?php
// Incluir el modelo de Proveedor
require_once '../models/Proveedor.php';

// Obtener la lista de proveedores
$proveedor = new Proveedor();
$proveedores = $proveedor->obtenerProveedores();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Proveedores</title>
</head>
<body>
    <h2>Lista de Proveedores</h2>

    <a href="menu.php">Volver al menú</a>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($proveedores): ?>
                <?php foreach ($proveedores as $proveedor): ?>
                    <tr>
                        <td><?php echo $proveedor['nombre']; ?></td>
                        <td><?php echo $proveedor['direccion']; ?></td>
                        <td><?php echo $proveedor['telefono']; ?></td>
                        <td><?php echo $proveedor['correo']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No hay proveedores registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
