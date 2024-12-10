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

    // Método para obtener una marca específica para editarla
    public function editar($idmarca) {
        $marca = new Marca();
        $marcaData = $marca->obtenerMarcaPorId($idmarca);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            if ($marca->actualizarMarca($idmarca, $nombre)) {
                header("Location: ../views/verMarcas.php");
                exit();
            } else {
                echo "Error al actualizar la marca.";
            }
        }

        include_once '../views/actualizarMarca.php'; // Mostrar el formulario de edición
    }

    // Método para eliminar una marca
    public function eliminar($idmarca) {
        $marca = new Marca();
        if ($marca->eliminarMarca($idmarca)) {
            header("Location: ../views/verMarcas.php");
            exit();
        } else {
            echo "Error al eliminar la marca.";
        }
    }
}
?>
