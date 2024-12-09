<?php
// src/models/Proveedor.php

require_once('../config/database.php');  // Incluye la conexión a la base de datos

class Proveedor {
    private $db;

    // Constructor que establece la conexión con la base de datos
    public function __construct() {
        $this->db = connectDB();  // Llamada a la función de conexión
    }

    // Método para obtener la lista de proveedores
    public function listarProveedores() {
        $sql = "SELECT * FROM proveedor";  // Consulta para obtener todos los proveedores
        
        // Ejecuta la consulta y obtiene los resultados
        $result = $this->db->query($sql);

        // Verifica si la consulta fue exitosa
        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);  // Devuelve todos los resultados como un array asociativo
        }

        return ('No hay'); // Si no hay resultados, devuelve null
    }
}
?>

