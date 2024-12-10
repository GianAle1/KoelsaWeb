<?php
// models/Proveedor.php

require_once '../config/database.php';

class Proveedor {
    
    // Función para registrar un proveedor
    public function registrarProveedor($nombre, $direccion, $telefono, $correo) {
        // Conexión a la base de datos
        $conn = connectDB();

        // Preparar la consulta para insertar el proveedor
        $stmt = $conn->prepare("INSERT INTO proveedor (nombre, direccion, telefono, correo) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(2, $direccion, PDO::PARAM_STR);
        $stmt->bindParam(3, $telefono, PDO::PARAM_STR);
        $stmt->bindParam(4, $correo, PDO::PARAM_STR);

        // Ejecutar la consulta
        return $stmt->execute();
    }

    // Función para obtener todos los proveedores
    public function obtenerProveedores() {
        // Conexión a la base de datos
        $conn = connectDB();

        // Preparar la consulta para obtener todos los proveedores
        $stmt = $conn->query("SELECT * FROM proveedor");

        // Ejecutar la consulta y retornar los resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
