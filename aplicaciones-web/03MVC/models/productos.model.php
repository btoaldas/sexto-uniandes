<?php
//TODO: Clase de Productos
require_once('./config/config.php');
class ProductosModel {
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function obtenerTodosLosProductos() {
        $sql = "SELECT * FROM productos";
        $result = $this->conexion->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertarProducto($producto) {
        $sql = "INSERT INTO productos (Codigo_Barras, Nombre_Producto, Graba_IVA) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssi", $producto['Codigo_Barras'], $producto['Nombre_Producto'], $producto['Graba_IVA']);
        return $stmt->execute();
    }

    public function actualizarProducto($id, $producto) {
        $sql = "UPDATE productos SET Codigo_Barras = ?, Nombre_Producto = ?, Graba_IVA = ? WHERE idProductos = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssii", $producto['Codigo_Barras'], $producto['Nombre_Producto'], $producto['Graba_IVA'], $id);
        return $stmt->execute();
    }

    public function eliminarProducto($id) {
        $sql = "DELETE FROM productos WHERE idProductos = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
