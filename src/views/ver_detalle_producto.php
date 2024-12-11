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

// Procesar la actualización de la cantidad si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar_cantidad'])) {
    $nuevaCantidad = $_POST['cantidad'];

    // Llamar al método para actualizar la cantidad
    if ($productoController->actualizarCantidad($idproducto, $nuevaCantidad)) {
        // Recargar la página para mostrar la cantidad actualizada
        header("Location: ver_detalle_producto.php?id=$idproducto&mensaje=actualizado");
        exit();
    } else {
        echo "Error al actualizar la cantidad.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #5a6268;
        }
        .card img {
            max-height: 300px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Detalle del Producto</h2>

    <!-- Mostrar detalles del producto -->
    <div class="card mb-4">
        <img src="../<?php echo $producto['ruta']; ?>" class="card-img-top" alt="Imagen del Producto" onerror="this.src='../uploads/default.jpg';">
        <div class="card-body">
            <h5 class="card-title text-primary"><?php echo $producto['descripcion']; ?></h5>
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>Código:</strong> <?php echo $producto['codigo']; ?></p>
                    <p class="card-text"><strong>Marca:</strong> <?php echo $producto['marca']; ?></p>
                    <p class="card-text"><strong>Unidad de Medida:</strong> <?php echo $producto['undMedida']; ?></p>
                </div>
                <div class="col-md-6">
                    <p class="card-text"><strong>Cantidad Actual:</strong> <?php echo $producto['cantidad']; ?></p>
                    <p class="card-text"><strong>Proveedor:</strong> <?php echo $producto['proveedor']; ?></p>
                    <p class="card-text"><strong>Almacén:</strong> <?php echo $producto['almacen']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario para editar la cantidad -->
    <div class="card p-4 mb-4">
        <h4 class="text-center">Editar Cantidad</h4>
        <form action="ver_detalle_producto.php?id=<?php echo $idproducto; ?>" method="POST">
            <div class="mb-3">
                <label for="cantidad" class="form-label">Nueva Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required>
            </div>
            <div class="text-center">
                <button type="submit" name="actualizar_cantidad" class="btn btn-primary">Actualizar Cantidad</button>
                <a href="ver_productos.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
