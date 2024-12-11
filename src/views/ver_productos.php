<?php
// Incluir el controlador de productos
include_once '../controllers/ProductoController.php';

// Crear una instancia del controlador
$productoController = new ProductoController();

// Llamar al método para obtener los productos
$productos = $productoController->leer();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Lista de Productos</h2>

    <?php if (empty($productos)): ?>
        <div class="alert alert-warning" role="alert">
            No hay productos disponibles.
        </div>
    <?php else: ?>
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
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
            </thead>
            <tbody>
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
                            <!-- Botón Ver Producto -->
                            <a href="ver_detalle_producto.php?id=<?php echo $producto['idproducto']; ?>" class="btn btn-info btn-sm">Ver Producto</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
