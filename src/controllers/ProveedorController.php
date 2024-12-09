<?php
// src/controllers/ProveedorController.php

require_once('../models/Proveedor.php');  // Incluye el modelo Proveedor

class ProveedorController {

    public function listar() {
        $proveedorModel = new Proveedor();
        $proveedores = $proveedorModel->listarProveedores();  // Obtiene los proveedores desde el modelo

        // Verifica si se obtuvieron proveedores
        if ($proveedores) {
            require_once(__DIR__ . '../views/listado_proveedores.php');  // Carga la vista y pasa los datos
        } else {
            echo "No se encontraron proveedores.";
        }
    }
}
?>
