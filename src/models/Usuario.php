<?php
// src/models/Usuario.php

// Incluir la clase Database desde la carpeta config
include_once __DIR__ . '/../config/database.php';  // Ruta correcta

class Usuario {
    private $conn;

    public function __construct() {
        $this->conn = connectDB(); // Conexión a la base de datos
    }

    public function verificarUsuario($correo, $password) {
        // Consulta para obtener el usuario por su correo
        $query = "SELECT * FROM usuario WHERE correo = :correo"; 
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Comparar la contraseña almacenada (en texto plano) con la recibida
            if ($password === $usuario['contraseña']) {  // Comparación directa
                return $usuario;  // Contraseña correcta
            }
        }

        return false;  // Si no existe el usuario o la contraseña es incorrecta
    }
}
?>
