<?php
// src/models/Proveedor.php

require_once('../config/database.php');

class Proveedor {
    private $db;

    public function __construct() {
        $this->db = connectDB();  // Llamada a la función de conexión
    }

    // Método para obtener la lista de proveedores
    public function listarProveedores() {
        $sql = "SELECT * FROM proveedor";
        $result = $this->db->query($sql);

        // Depuración: Verificar si se obtuvieron resultados
        if ($result) {
            $proveedores = $result->fetchAll(PDO::FETCH_ASSOC);
            // Depuración: Verificar si los datos están siendo recuperados
            var_dump($proveedores);
            return $proveedores;
        }
        
        return null;  // Si no hay resultados, devuelve null
    }
}
?>

