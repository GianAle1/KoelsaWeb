<?php
// src/config/database.php

function connectDB() {
    $host = '127.0.0.1';
    $dbName = 'koelsa';
    $username = 'root'; // Cambia esto según tu configuración
    $password = '080322'; // Cambia esto según tu configuración
    $port = '3310'; // Asegúrate de usar el puerto correcto (si usas un puerto diferente, cámbialo)

    try {
        // Incluye el puerto en la cadena de conexión y especifica UTF-8 como charset
        $pdo = new PDO("mysql:host=$host;dbname=$dbName;port=$port;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}
