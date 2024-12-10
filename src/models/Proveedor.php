<?php
// models/Proveedor.php

class Proveedor
{
    private $conn;

    // Constructor para la conexión a la base de datos
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Método para obtener todos los proveedores
    public function obtenerProveedores()
    {
        $query = "SELECT * FROM proveedores";  // Asegúrate de que el nombre de la tabla sea correcto
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        // Retornar todos los proveedores en un array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

