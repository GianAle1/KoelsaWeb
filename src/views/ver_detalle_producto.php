<?php
// Incluir el controlador de productos
include_once '../controllers/ProductoController.php';

// Verificar si se recibió el ID del producto
if (isset($_GET['id'])) {
    $idproducto = $_GET['id'];

    // Crear una instancia del controlador
    $productoController = new ProductoController();

    // Obtener los detalles del producto
    $producto = $productoController->obtenerProductoPorId($idproducto);

    // Verificar si el producto existe
    if (!$producto) {
        echo "Producto no encontrado.";
        exit();
    }
} else {
    echo "ID de producto no especificado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Detalle del Producto</h2>

    <!-- Mostrar detalles del producto -->
    <div class="card mt-4">
        <!-- Depuración: Mostrar la ruta generada -->
        <?php echo "<p>Ruta generada: ../" . $producto['ruta'] . "</p>"; ?>

        <!-- Mostrar imagen del producto -->
        <img src="../<?php echo $producto['ruta']; ?>" class="card-img-top" alt="Imagen del Producto">
        <div class="card-body">
            <h5 class="card-title"><?php echo $producto['descripcion']; ?></h5>
            <p class="card-text"><strong>Código:</strong> <?php echo $producto['codigo']; ?></p>
            <p class="card-text"><strong>Marca:</strong> <?php echo $producto['marca']; ?></p>
            <p class="card-text"><strong>Unidad de Medida:</strong> <?php echo $producto['undMedida']; ?></p>
            <p class="card-text"><strong>Cantidad:</strong> <?php echo $producto['cantidad']; ?></p>
            <p class="card-text"><strong>Proveedor:</strong> <?php echo $producto['proveedor']; ?></p>
            <p class="card-text"><strong>Almacén:</strong> <?php echo $producto['almacen']; ?></p>
            <a href="ver_productos.php" class="btn btn-primary">Volver a la Lista</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
