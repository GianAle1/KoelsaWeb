<?php
// src/controllers/ProveedorController.php

require_once('../models/Proveedor.php');  // Incluye el modelo Proveedor

class ProveedorController {

    // Acción para mostrar la lista de proveedores
    public function listar() {
        // Crear una instancia del modelo Proveedor
        $proveedorModel = new Proveedor();

        // Obtener la lista de proveedores
        $proveedores = $proveedorModel->listarProveedores();

        // Verificar si se obtuvieron proveedores
        if ($proveedores) {
            // Pasar los datos de los proveedores a la vista
            require_once(__DIR__ . '../views/listado_proveedores.php');  // Cargar la vista
        } else {
            // Si no se encontraron proveedores, mostrar un mensaje
            echo "No se encontraron proveedosssres.";
        }
    }
}
?>
