<?php
// UsuarioController.php

// Incluir el modelo Usuario
include_once '../models/Usuario.php';

class UsuarioController {

    // Función para procesar el login
    public function login() {
        // Verificar si el formulario fue enviado por POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los valores del formulario
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Crear una instancia del modelo Usuario
            $usuarioModel = new Usuario();

            // Verificar el usuario (suponiendo que verificarUsuario devuelve un array con los datos del usuario o false si no existe)
            $usuario = $usuarioModel->verificarUsuario($email, $password);

            if ($usuario) {
                // Si las credenciales son correctas, almacenar los datos en la sesión
                session_start();
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre']; // Puedes agregar más datos si los necesitas

                // Redirigir al menú con los datos del usuario
               
                header('Location: ../views/menu.php');
                exit;
            } else {
                // Si las credenciales no son correctas, mostrar un error
                $error = "Credenciales incorrectas.";
                include '../views/login.php'; // Volver a mostrar el formulario de login con el error
                return;
            }
        } else {
            // Si el formulario no fue enviado, mostrar el formulario de login
            include '../views/login.php';
        }
    }
}
?>
