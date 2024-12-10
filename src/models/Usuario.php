<?php
// models/Usuario.php

require_once 'config/database.php';

class Usuario {
    public function verificarUsuario($correo, $contraseña) {
        // Conexión a la base de datos
        $conn = connectDB();

        // Preparar la consulta para seleccionar el usuario por correo
        $stmt = $conn->prepare("SELECT idusuario, nombre, apellidos, correo, contraseña FROM usuario WHERE correo = ?");
        $stmt->bindParam(1, $correo, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si el usuario existe y si la contraseña es correcta
        if ($result && $contraseña == $result['contraseña']) {
            // Si las credenciales son correctas, almacenar la información en la sesión
            $_SESSION['usuario'] = $result;
            return true;
        }

        return false;  // Si las credenciales son incorrectas
    }
}
?>
