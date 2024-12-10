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

public function actualizarProducto($idproducto, $codigo, $descripcion, $idmarca, $undMedida, $cantidad, $idproveedor, $idalmacen) {
    try {
        $sql = "UPDATE producto SET 
                    codigo = :codigo,
                    descripcion = :descripcion,
                    idmarca = :idmarca,
                    undMedida = :undMedida,
                    cantidad = :cantidad,
                    idproveedor = :idproveedor,
                    idalmacen = :idalmacen
                WHERE idproducto = :idproducto";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':idmarca', $idmarca);
        $stmt->bindParam(':undMedida', $undMedida);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':idproveedor', $idproveedor);
        $stmt->bindParam(':idalmacen', $idalmacen);
        $stmt->bindParam(':idproducto', $idproducto);

        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Error al actualizar el producto: " . $e->getMessage();
        return false;
    }
}





    
}
?>
