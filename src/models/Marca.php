<?php
// models/Marca.php

require_once '../config/database.php';

class Marca {

    // Función para registrar una marca
    public function registrarMarca($nombre) {
        // Conexión a la base de datos
        $conn = connectDB();

        // Preparar la consulta para insertar la marca
        $stmt = $conn->prepare("INSERT INTO marca (nombre) VALUES (?)");
        $stmt->bindParam(1, $nombre, PDO::PARAM_STR);

        // Ejecutar la consulta
        return $stmt->execute();
    }

    // Función para obtener todas las marcas
    public function obtenerMarcas() {
        // Conexión a la base de datos
        $conn = connectDB();

        // Preparar la consulta para obtener todas las marcas
        $stmt = $conn->query("SELECT * FROM marca");

        // Ejecutar la consulta y retornar los resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
