<?php
// Incluir el controlador y el modelo
include_once '../controllers/ProductoController.php';

// Crear una instancia del controlador
$productoController = new ProductoController();

// Llamar al método para obtener los productos
$productos = $productoController->leer(); // Ahora obtendrás los productos correctamente
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Productos</title>
</head>
<body>
    <h2>Productos</h2>

    <!-- Verificar si hay productos -->
    <?php if (empty($productos)): ?>
        <p>No hay productos disponibles.</p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>ID Producto</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Marca</th>
                <th>Unidad de Medida</th>
                <th>Cantidad</th>
                <th>Proveedor</th>
                <th>Almacén</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo $producto['idproducto']; ?></td>
                    <td><?php echo $producto['codigo']; ?></td>
                    <td><?php echo $producto['descripcion']; ?></td>
                    <td><?php echo $producto['marca']; ?></td>
                    <td><?php echo $producto['undMedida']; ?></td>
                    <td><?php echo $producto['cantidad']; ?></td>
                    <td><?php echo $producto['proveedor']; ?></td>
                    <td><?php echo $producto['almacen']; ?></td>
                    <td>
                        <!-- Agregar acciones como editar o eliminar -->
                        <a href="editar_producto.php?id=<?php echo $producto['idproducto']; ?>">Editar</a> |
                        <a href="eliminar_producto.php?id=<?php echo $producto['idproducto']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
