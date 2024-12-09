<?php
// src/models/Proveedor.php

require_once('../config/database.php');

class Proveedor {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Método para obtener la lista de proveedores
    public function listarProveedores() {
        $sql = "SELECT nombre, direccion, telefono, correo FROM proveedor";
        $result = $this->db->query($sql);
    
        // Verificar si la consulta se ejecuta correctamente y tiene resultados
        if ($result) {
            $proveedores = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($proveedores) > 0) {
                return $proveedores;
            } else {
                echo "No hay proveedores en la base de datos.";  // Para depuración
            }
        } else {
            // Si la consulta falla, mostrar el error
            echo "Error en la consulta SQL: " . implode(", ", $this->db->errorInfo());
        }
    
        return null;
    }
    
    
}
?>

