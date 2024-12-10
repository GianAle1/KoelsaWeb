<!-- views/actualizar_producto.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
</head>
<body>
    <h1>Actualizar Producto</h1>
    <form action="ProductoController.php?action=actualizar" method="POST">
        <input type="hidden" name="idproducto" value="<?php echo $producto['idproducto']; ?>">

        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" value="<?php echo $producto['codigo']; ?>" required><br><br>

        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" value="<?php echo $producto['descripcion']; ?>" required><br><br>

        <label for="idmarca">Marca:</label>
        <select id="idmarca" name="idmarca">
            <option value="<?php echo $producto['idmarca']; ?>" selected>Marca actual</option>
            <!-- Agregar otras opciones según las marcas disponibles -->
            <option value="1">Marca 1</option>
            <option value="2">Marca 2</option>
        </select><br><br>

        <label for="undMedida">Unidad de Medida:</label>
        <input type="text" id="undMedida" name="undMedida" value="<?php echo $producto['undMedida']; ?>" required><br><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" value="<?php echo $producto['cantidad']; ?>"><br><br>

        <label for="idproveedor">Proveedor:</label>
        <select id="idproveedor" name="idproveedor">
            <option value="<?php echo $producto['idproveedor']; ?>" selected>Proveedor actual</option>
            <!-- Agregar otras opciones según los proveedores disponibles -->
            <option value="1">Proveedor 1</option>
            <option value="2">Proveedor 2</option>
        </select><br><br>

        <label for="idalmacen">Almacén:</label>
        <select id="idalmacen" name="idalmacen">
            <option value="<?php echo $producto['idalmacen']; ?>" selected>Almacén actual</option>
            <!-- Agregar otras opciones según los almacenes disponibles -->
            <option value="1">Almacén 1</option>
            <option value="2">Almacén 2</option>
        </select><br><br>

        <button type="submit">Actualizar Producto</button>
    </form>
</body>
</html>
