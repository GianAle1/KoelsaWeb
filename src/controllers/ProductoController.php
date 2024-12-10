<?php
// controllers/ProductoController.php
include_once '../models/Producto.php';  // Incluir el modelo Producto

class ProductoController {

    // Método para crear un producto
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcion'];
            $idmarca = $_POST['idmarca'];
            $undMedida = $_POST['undMedida'];
            $cantidad = $_POST['cantidad'];
            $idproveedor = $_POST['idproveedor'];
            $idalmacen = $_POST['idalmacen'];

            // Crear una nueva instancia del modelo Producto
            $producto = new Producto();

            // Llamar a la función para crear el producto
            if ($producto->crearProducto($codigo, $descripcion, $idmarca, $undMedida, $cantidad, $idproveedor, $idalmacen)) {
                echo "Producto creado exitosamente.";
            } else {
                echo "Error al crear el producto.";
            }
        }
    }

    // Método para leer los productos
    public function leer() {
        $producto = new Producto();
        $productos = $producto->obtenerProductos(); // Obtener productos desde el modelo
    
        return $productos;  // Devuelve los productos a la vista
    }

    // Método para actualizar un producto
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $idproducto = $_POST['idproducto'];
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcion'];
            $idmarca = $_POST['idmarca'];
            $undMedida = $_POST['undMedida'];
            $cantidad = $_POST['cantidad'];
            $idproveedor = $_POST['idproveedor'];
            $idalmacen = $_POST['idalmacen'];

            // Crear una nueva instancia del modelo Producto
            $producto = new Producto();

            // Llamar a la función para actualizar el producto
            if ($producto->actualizarProducto($idproducto, $codigo, $descripcion, $idmarca, $undMedida, $cantidad, $idproveedor, $idalmacen)) {
                echo "Producto actualizado exitosamente.";
            } else {
                echo "Error al actualizar el producto.";
            }
        }
    }

    // Método para eliminar un producto
    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener el ID del producto a eliminar
            $idproducto = $_POST['idproducto'];

            // Crear una nueva instancia del modelo Producto
            $producto = new Producto();

            // Llamar a la función para eliminar el producto
            if ($producto->eliminarProducto($idproducto)) {
                echo "Producto eliminado exitosamente.";
            } else {
                echo "Error al eliminar el producto.";
            }
        }
    }
}
?>
