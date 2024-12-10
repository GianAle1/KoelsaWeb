<?php
// views/listado_proveedores.php

if (!empty($proveedores)) {
    echo "<h1>Listado de Proveedores</h1>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
            </tr>";
    
    foreach ($proveedores as $proveedor) {
        echo "<tr>
                <td>" . htmlspecialchars($proveedor['id']) . "</td>
                <td>" . htmlspecialchars($proveedor['nombre']) . "</td>
                <td>" . htmlspecialchars($proveedor['direccion']) . "</td>
                <td>" . htmlspecialchars($proveedor['telefono']) . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No hay proveedores registrados.</p>";
}
?>
