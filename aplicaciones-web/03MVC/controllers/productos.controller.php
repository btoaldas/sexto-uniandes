<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de productos

require_once('./models/productos.model.php');
error_reporting(0);

class ProductosController {
    public function todos() {
        $productosModel = new ProductosModel();
        return $productosModel->obtenerTodosLosProductos();
    }

    public function crear($producto) {
        $productosModel = new ProductosModel();
        return $productosModel->insertarProducto($producto);
    }

    public function actualizar($id, $producto) {
        $productosModel = new ProductosModel();
        return $productosModel->actualizarProducto($id, $producto);
    }

    public function eliminar($id) {
        $productosModel = new ProductosModel();
        return $productosModel->eliminarProducto($id);
    }
}
?>
