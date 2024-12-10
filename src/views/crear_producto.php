<!-- views/crear_producto.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
</head>
<body>
    <h2>Crear Producto</h2>
    
    <form action="crear_producto.php" method="POST">
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" required>
        <br>

        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>
        <br>

        <label for="idmarca">Marca:</label>
        <select name="idma
