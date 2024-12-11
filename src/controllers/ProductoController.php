<?php
// controllers/ProductoController.php
include_once '../models/Producto.php';  // Incluir el modelo Producto

class ProductoController {


    // Método para leer los productos
    public function leer() {
        $producto = new Producto();
        $productos = $producto->obtenerProductos(); // Obtener productos desde el modelo
    
        return $productos;  // Devuelve los productos a la vista
    }

    
    public function obtenerProductoPorId($idproducto) {
        $producto = new Producto();
        return $producto->obtenerPorId($idproducto);
    }
}
?>
