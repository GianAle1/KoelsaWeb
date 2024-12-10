<?php
// views/verMarcas.php

// Incluir el modelo Marca
require_once '../models/Marca.php';

// Obtener la lista de marcas
$marca = new Marca();
$marcas = $marca->obtenerMarcas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Marcas</title>
</head>
<body>
    <h2>Lista de Marcas</h2>

    <a href="menu.php">Volver al menú</a>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($marcas): ?>
                <?php foreach ($marcas as $marca): ?>
                    <tr>
                        <td><?php echo $marca['nombre']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="1">No hay marcas registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
