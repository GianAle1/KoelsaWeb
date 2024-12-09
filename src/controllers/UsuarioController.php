<?php
// src/controllers/UsuarioController.php
require_once('./models/Usuario.php');

class UsuarioController {

    public function login() {
        // Verifica si los datos fueron enviados a través del formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Crea un objeto Usuario
            $usuario = new Usuario();
            $usuario->setEmail($email);
            $usuario->setPassword($password);

            // Llama al modelo para obtener el usuario por correo
            $user = $usuario->getUsuarioByEmail($email);

            if ($user && $user['contraseña'] == $password) {
                // Si las contraseñas coinciden, redirige a la página de menú
                session_start();
                $_SESSION['user'] = $user;
                header("Location: ./views/menu.php");
                exit;
            } else {
                // Si las contraseñas no coinciden, muestra un error
                $error = "Usuario o contraseña incorrectos";
                include('../views/login.php');
            }
        } else {
            // Si no se envió el formulario, muestra la página de login
            include('./views/login.php');
        }
    }
}
?>