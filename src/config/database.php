<?php
// src/config/database.php

function connectDB() {
    $host = '127.0.0.1';
    $dbName = 'koelsa';
    $username = 'root';
    $password = '080322';
    $port = '3310';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbName;port=$port;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar la conexión
        $pdo->query("SELECT 1");  // Simple test query
        return $pdo;
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}


