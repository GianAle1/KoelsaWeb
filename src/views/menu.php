<?php
session_start();
if (!isset($_SESSION['user'])) {
    // Si no hay una sesión activa, redirige al login
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user']; // Obtiene los datos del usuario desde la sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar (Menú superior) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Koelsa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <!-- Menú de Inicio -->
        <li class="nav-item">
          <a class="nav-link active" href="#">Inicio</a>
        </li>
        
        <!-- Menú de Productos (Dropdown) -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Productos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Listado de productos</a></li>
            <li><a class="dropdown-item" href="#">Agregar producto</a></li>
          </ul>
        </li>

        <!-- Menú de Proveedores (Dropdown) -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProveedores" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Proveedores
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownProveedores">
            <li><a class="dropdown-item" href="listado_proveedores.php">Listado de proveedores</a></li>
            <li><a class="dropdown-item" href="#">Agregar proveedor</a></li>
          </ul>
        </li>

        <!-- Menú de Inventario (Dropdown) -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownInventario" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inventario
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownInventario">
            <li><a class="dropdown-item" href="#">Ver inventario</a></li>
            <li><a class="dropdown-item" href="#">Actualizar inventario</a></li>
          </ul>
        </li>

        <!-- Menú de Cerrar sesión -->
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Contenido principal (información del usuario) -->
<div class="container mt-4">
    <h2>Bienvenido, <?= htmlspecialchars($user['nombre']) ?>!</h2>
    <p>Email: <?= htmlspecialchars($user['correo']) ?></p>
    <p>Apellidos: <?= htmlspecialchars($user['apellidos']) ?></p>
</div>

<!-- Bootstrap JS (para interactividad como el navbar en dispositivos móviles) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>

</body>
</html>
