<?php
// src/views/listado_proveedores.php

if (isset($proveedores) && $proveedores) {
    echo "<h2>Listado de Proveedores</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Correo</th></tr>";

    // Mostrar los proveedores en la tabla
    foreach ($proveedores as $proveedor) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($proveedor['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($proveedor['direccion']) . "</td>";
        echo "<td>" . htmlspecialchars($proveedor['telefono']) . "</td>";
        echo "<td>" . htmlspecialchars($proveedor['correo']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No se encontraron proveedores.</p>";
}
?>
