<!-- views/eliminar_producto.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
</head>
<body>
    <h1>Eliminar Producto</h1>
    <p>¿Estás seguro de que deseas eliminar el producto <strong><?php echo $producto['codigo']; ?></strong>?</p>
    <form action="ProductoController.php?action=eliminar" method="POST">
        <input type="hidden" name="idproducto" value="<?php echo $producto['idproducto']; ?>">
        <button type="submit">Eliminar</button>
    </form>
    <a href="ProductoController.php?action=ver">Cancelar</a>
</body>
</html>
