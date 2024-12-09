<?php
// src/index.php
session_start();
// Obtiene los parámetros controller y action de la URL, con valores predeterminados
$controllerName = isset($_GET['controller']) ? ucfirst(strtolower($_GET['controller'])) : 'Usuario'; // Por defecto el controlador es 'Usuario'
$actionName = isset($_GET['action']) ? $_GET['action'] : 'login'; // Por defecto la acción es 'login'
// Construye el nombre completo del archivo del controlador
$controllerFile = __DIR__ . '/controllers/' . $controllerName . 'Controller.php';
try {
    // Verifica si el archivo del controlador existe
    if (file_exists($controllerFile)) {
        require_once $controllerFile; // Incluye el controlador
    } else {
        throw new Exception("Controlador no encontrado: " . $controllerName); // Error si no se encuentra el controlador
    }
    // Construye el nombre completo de la clase del controlador
    $controllerClass = $controllerName . 'Controller';

    // Verifica si la clase existe
    if (!class_exists($controllerClass)) {
        throw new Exception("Clase del controlador no encontrada: " . $controllerClass); // Error si la clase no existe
    }

    // Instancia del controlador
    $controller = new $controllerClass();
    // Verifica si el método (acción) existe en el controlador
    if (method_exists($controller, $actionName)) {
        $controller->$actionName();  // Ejecuta la acción
    } else {
        throw new Exception("Acción no encontrada en el controlador: " . $actionName); // Error si no existe la acción
    }
} catch (Exception $e) {
    // Muestra el mensaje de error de manera amigable
    echo "<h1>Error</h1>";
    echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
}