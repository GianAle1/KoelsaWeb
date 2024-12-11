<?php
// src/models/Producto.php
include_once '../config/database.php'; // Incluir la conexión a la base de datos

class Marca {
    private $conexion;

    public function __construct() {
        // Usamos la función connectDB para obtener la conexión
        $this->conexion = connectDB();
    }

    // Crear una nueva marca
    public function crearMarca($nombre) {
        try {
            $sql = "INSERT INTO marca (nombre) VALUES (:nombre)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al crear la marca: " . $e->getMessage();
            return false;
        }
    }

    // Obtener todas las marcas
    public function obtenerMarcas() {
        try {
            $sql = "SELECT * FROM marca";
            $stmt = $this->conexion->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener las marcas: " . $e->getMessage();
            return [];
        }
    }

    // Obtener una marca por su ID
    public function obtenerMarcaPorId($idmarca) {
        try {
            $sql = "SELECT * FROM marca WHERE idmarca = :idmarca";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':idmarca', $idmarca);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener la marca: " . $e->getMessage();
            return null;
        }
    }


public function actualizarMarca($idmarca, $nombre) {
    try {
        // Consulta para actualizar la marca
        $sql = "UPDATE marca SET nombre = :nombre WHERE idmarca = :idmarca";

        // Preparar la consulta
        $stmt = $this->conexion->prepare($sql);

        // Vincular los parámetros con los valores
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);  // Se especifica el tipo de dato
        $stmt->bindParam(':idmarca', $idmarca, PDO::PARAM_INT);  // Se especifica el tipo de dato

        // Ejecutar la consulta y devolver el resultado
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

    } catch (PDOException $e) {
        // Capturar cualquier excepción y mostrar un mensaje detallado
        echo "Error al actualizar la marca: " . $e->getMessage();
        return false;
    }
}


public function eliminarMarca($idmarca) {
    try {
        // Consulta SQL para eliminar la marca
        $sql = "DELETE FROM marca WHERE idmarca = :idmarca";

        // Preparar la consulta
        $stmt = $this->conexion->prepare($sql);

        // Vincular el parámetro :idmarca
        $stmt->bindParam(':idmarca', $idmarca, PDO::PARAM_INT);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true; // Marca eliminada exitosamente
        } else {
            return false; // Error al eliminar la marca
        }
    } catch (PDOException $e) {
        // Capturar cualquier excepción y mostrar un mensaje detallado
        echo "Error al eliminar la marca: " . $e->getMessage();
        return false;
    }
}


}
?>
