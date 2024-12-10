<?php
// src/controllers/UsuarioController.php

include_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {

    // Acción para mostrar el formulario de login
    public function login()
    {
        // Si ya está logueado, redirigir al controlador de proveedores
        if (isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=Proveedor&action=listarProveedores');
            exit;
        }

        // Mostrar la vista de login (la vista ya está incluida directamente en index.php)
        include_once 'views/login.php';
    }

    // Acción para procesar el login
    public function procesarLogin()
    {
        // Verifica si los datos fueron enviados por POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $correo = $_POST['correo'];
            $password = $_POST['password'];

            // Crear una instancia del modelo Usuario
            $usuarioModel = new Usuario();

            // Verificar si el usuario existe y la contraseña es correcta
            $usuario = $usuarioModel->verificarUsuario($correo, $password);

            if ($usuario) {
                // Si las credenciales son correctas, se guarda la sesión
                $_SESSION['usuario_id'] = $usuario['id'];  // Guardar el ID del usuario en la sesión
                $_SESSION['usuario_correo'] = $usuario['correo'];  // Guardar el correo del usuario en la sesión
                header('Location: index.php?controller=Proveedor&action=listarProveedores');  // Redirigir al listado de proveedores
                exit;
            } else {
                // Si las credenciales son incorrectas, redirigir con un mensaje de error
                $error = 'Correo o contraseña incorrectos';
                include_once 'views/login.php';  // Volver a mostrar el formulario de login
            }
        } else {
            // Si no es un POST, redirigir al login
            header('Location: index.php?controller=Usuario&action=login');
            exit;
        }
    }

    // Acción para cerrar sesión
    public function logout()
    {
        session_start();
        session_destroy();  // Eliminar la sesión
        header('Location: index.php?controller=Usuario&action=login');  // Redirigir al login
        exit;
    }
}
?>
