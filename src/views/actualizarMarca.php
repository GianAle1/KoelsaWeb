<!-- views/actualizarMarca.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Marca</title>
</head>
<body>
    <h2>Actualizar Marca</h2>
    <form method="POST" action="">
        <label for="nombre">Nombre de la Marca:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $marcaData['nombre']; ?>" required>
        <button type="submit">Actualizar</button>
    </form>
    <a href="verMarcas.php">Ver todas las marcas</a>
</body>
</html>
