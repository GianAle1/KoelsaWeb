<?php
// src/models/Usuario.php
require_once('./config/database.php');

class Usuario {

    private $email;
    private $password;

    // Métodos setters y getters para los atributos
    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    // Método para obtener el usuario por su email
    public function getUsuarioByEmail($email) {
        $pdo = connectDB(); // Establece la conexión con la base de datos
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE correo = :correo");
        $stmt->bindParam(':correo', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna el usuario
    }
}

?>
