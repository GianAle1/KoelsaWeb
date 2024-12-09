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
        $sql = "SELECT nombre, direccion, telefono, correo FROM proveedor";
        $result = $this->db->query($sql);
    
        // Verificar si la consulta devuelve resultados
        if ($result) {
            $proveedores = $result->fetchAll(PDO::FETCH_ASSOC);
            
            // Depuración: Verifica si se obtuvieron datos
            if (count($proveedores) > 0) {
                return $proveedores;
            } else {
                // Si no hay resultados, muestra un mensaje
                echo "No hay proveedores en la base de datos.";
            }
        } else {
            // Si no se ejecutó correctamente, muestra el error
            echo "Error en la consulta SQL: " . implode(", ", $this->db->errorInfo());
        }
    
        return null;  // Retorna null si no hay resultados
    }
    
}
?>

