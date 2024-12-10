<?php
// controllers/ProveedorController.php

include_once 'models/Proveedor.php';

class ProveedorController
{
    private $model;

    public function __construct($db)
    {
        // Crear una instancia del modelo Proveedor
        $this->model = new Proveedor($db);
    }

    public function listarProveedores()
    {
        // Obtener todos los proveedores desde el modelo
        $proveedores = $this->model->obtenerProveedores();

        // Pasar los datos a la vista (listado_proveedores.php)
        include 'views/listado_proveedores.php';
    }
}
?>
