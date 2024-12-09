<?php if (isset($proveedores) && $proveedores): ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proveedores as $proveedor): ?>
                <tr>
                    <td><?php echo htmlspecialchars($proveedor['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($proveedor['direccion']); ?></td>
                    <td><?php echo htmlspecialchars($proveedor['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($proveedor['correo']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No se encontraron proveedores.</p>
<?php endif; ?>
