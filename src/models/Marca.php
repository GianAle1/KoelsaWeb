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

    // Actualizar una marca
    public function actualizarMarca($idmarca, $nombre) {
        try {
            $sql = "UPDATE marca SET nombre = :nombre WHERE idmarca = :idmarca";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':idmarca', $idmarca);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar la marca: " . $e->getMessage();
            return false;
        }
    }

    // Eliminar una marca
    public function eliminarMarca($idmarca) {
        try {
            $sql = "DELETE FROM marca WHERE idmarca = :idmarca";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':idmarca', $idmarca);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar la marca: " . $e->getMessage();
            return false;
        }
    }
}
?>
