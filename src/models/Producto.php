<?php
// src/models/Producto.php
include_once '../config/database.php'; // Incluir la conexión a la base de datos

class Producto {
    private $conexion;

    public function __construct() {
        // Usamos la función connectDB para obtener la conexión
        $this->conexion = connectDB();
    }

    // Obtener los productos
    public function obtenerProductos() {
        try {
            $sql = "SELECT 
                    p.idproducto,
                    p.codigo,
                    p.descripcion,
                    m.nombre AS marca,
                    pr.nombre AS proveedor,
                    a.nombre AS almacen,
                    p.undMedida,
                    p.cantidad
                FROM producto p
                JOIN marca m ON p.idmarca = m.idmarca
                JOIN proveedor pr ON p.idproveedor = pr.idproveedor
                JOIN almacen a ON p.idalmacen = a.idalmacen;
                ";
            $stmt = $this->conexion->query($sql);
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $productos;
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return null;
        }
    }

    // src/models/Producto.php

public function obtenerPorId($idproducto) {
    try {
        $sql = "SELECT 
                    p.ruta,
                    p.idproducto,
                    p.codigo,
                    p.descripcion,
                    m.nombre AS marca,
                    pr.nombre AS proveedor,
                    a.nombre AS almacen,
                    p.undMedida,
                    p.cantidad
                FROM producto p
                JOIN marca m ON p.idmarca = m.idmarca
                JOIN proveedor pr ON p.idproveedor = pr.idproveedor
                JOIN almacen a ON p.idalmacen = a.idalmacen WHERE idproducto = :idproducto";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':idproducto', $idproducto, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener el producto: " . $e->getMessage();
        return false;
    }
}

public function actualizarCantidadPorId($idproducto, $cantidad) {
    try {
        // Consulta para actualizar la cantidad
        $sql = "UPDATE producto SET cantidad = :cantidad WHERE idproducto = :idproducto";

        // Preparar la consulta
        $stmt = $this->conexion->prepare($sql);

        // Vincular parámetros
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(':idproducto', $idproducto, PDO::PARAM_INT);

        // Ejecutar la consulta
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Error al actualizar la cantidad: " . $e->getMessage();
        return false;
    }
}



    
}
?>
