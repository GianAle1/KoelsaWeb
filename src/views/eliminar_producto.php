<!-- views/eliminar_producto.php -->

<?php
// Suponiendo que el producto se obtiene de la base de datos y se pasa a esta vista
// Si no se ha definido previamente, necesitarás incluir el código para obtener el producto a eliminar.
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>

    <!-- Incluir Bootstrap 5 CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Contenedor principal -->
    <div class="container mt-5">

        <!-- Título -->
        <h1 class="text-center mb-4">Eliminar Producto</h1>

        <!-- Mensaje de confirmación -->
        <div class="alert alert-warning" role="alert">
            ¿Estás seguro de que deseas eliminar el producto <strong><?php echo $producto['codigo']; ?></strong>?
        </div>

        <!-- Formulario de eliminación -->
        <form action="ProductoController.php?action=eliminar" method="POST" class="text-center">
            <input type="hidden" name="idproducto" value="<?php echo $producto['idproducto']; ?>">
            
            <!-- Botones para confirmar o cancelar -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <a href="ProductoController.php?action=ver" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>

    </div>

    <!-- Incluir Bootstrap JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
