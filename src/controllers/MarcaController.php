<?php
// src/controllers/MarcaController.php
include_once '../models/Marca.php';

class MarcaController {

    // Método para crear una nueva marca
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $marca = new Marca();

            if ($marca->crearMarca($nombre)) {
                header("Location: ../views/verMarcas.php"); // Redirigir a la vista de marcas después de crear
                exit();
            } else {
                echo "Error al crear la marca.";
            }
        }

        include_once '../views/registrarMarca.php'; // Mostrar el formulario para crear una marca
    }

    // Método para obtener y mostrar todas las marcas
    public function ver() {
        $marca = new Marca();
        $marcas = $marca->obtenerMarcas(); // Llamamos al método que obtiene las marcas de la base de datos

        // Verificamos si las marcas son obtenidas correctamente y las pasamos a la vista
        if ($marcas !== null && is_array($marcas)) {
            return $marcas; // Devolvemos las marcas obtenidas
        } else {
            // Si no se obtienen marcas, devolvemos un array vacío
            return [];
        }
    }

    // Método para editar una marca
    public function editar($idmarca) {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    
        // Crear una instancia del modelo Marca
        $marca = new Marca();
    
        // Obtener los datos de la marca desde el modelo
        $marcaData = $marca->obtenerMarcaPorId($idmarca);
    
        // Verificar si la marca existe
        if (!$marcaData) {
            // Si no se encuentra la marca, redirigir a la lista de marcas
            header("Location: ../views/verMarcas.php"); // Cambié la redirección para que funcione correctamente
            exit();
        }
    
        // Si se recibe el formulario de actualización (POST)
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'editar') {
            // Recibir el nuevo nombre de la marca desde el formulario
            $nombre = $_POST['nombre'];
    
            // Llamar al método para actualizar la marca en la base de datos
            if ($marca->actualizarMarca($idmarca, $nombre)) {
                // Si la actualización fue exitosa, redirigir a la lista de marcas
                header("Location: ../views/verMarcas.php");
                exit();
            } else {
                // Si hubo un error al actualizar, mostrar mensaje de error
                echo "Error al actualizar la marca.";
            }
        }
    
        // Si no se envió el formulario, mostrar el formulario de edición con los datos de la marca
        include_once '../views/actualizarMarca.php';  // Pasar los datos de la marca a la vista
    }
    
    public function eliminar($idmarca) {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    
        // Crear una instancia del modelo Marca
        $marca = new Marca();
    
        // Llamar al método para eliminar la marca en la base de datos
        if ($marca->eliminarMarca($idmarca)) {
            // Si la eliminación fue exitosa, redirigir a la lista de marcas
            header("Location: ../views/verMarcas.php");
            exit();
        } else {
            // Si hubo un error al eliminar, mostrar mensaje de error
            echo "Error al eliminar la marca.";
        }
    }
    
}

?>
