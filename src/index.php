<?php
// src/index.php
require_once('controllers/UsuarioController.php');

// Obtiene el controlador y la acción desde la URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Usuario';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Crea una instancia del controlador correspondiente y llama a la acción
if (class_exists($controller . 'Controller')) {
    $controllerName = $controller . 'Controller';
    $controllerObject = new $controllerName();
    if (method_exists($controllerObject, $action)) {
        $controllerObject->$action();
    } else {
        echo "Acción no encontrada.";
    }
} else {
    echo "Controlador no encontrado.";
}

?>
