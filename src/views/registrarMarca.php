<?php
// views/registrarMarca.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'] ?? '';

    // Incluir el modelo Marca
    require_once '../models/Marca.php';

    // Crear una instancia de Marca
    $marca = new Marca();

    // Registrar la marca en la base de datos
    if ($marca->registrarMarca($nombre)) {
        echo "<p>Marca registrada con éxito.</p>";
    } else {
        echo "<p>Error al registrar la marca.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Marca</title>
</head>
<body>
    <h2>Registrar Marca</h2>

    <form method="POST" action="registrarMarca.php">
        <label for="nombre">Nombre de la Marca:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <button type="submit">Registrar</button>
    </form>

    <br>
    <a href="menu.php">Volver al menú</a>
</body>
</html>
