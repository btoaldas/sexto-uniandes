<?php
//TODO: Clase de Clientes
require_once '../config/config.php';
class ClientesModel {
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function obtenerTodosLosClientes() {
        $sql = "SELECT * FROM clientes";
        $result = $this->conexion->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertarCliente($cliente) {
        $sql = "INSERT INTO clientes (Nombres, Direccion, Telefono, Cedula, Correo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("sssss", $cliente['Nombres'], $cliente['Direccion'], $cliente['Telefono'], $cliente['Cedula'], $cliente['Correo']);
        return $stmt->execute();
    }

    public function actualizarCliente($id, $cliente) {
        $sql = "UPDATE clientes SET Nombres = ?, Direccion = ?, Telefono = ?, Cedula = ?, Correo = ? WHERE idClientes = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("sssssi", $cliente['Nombres'], $cliente['Direccion'], $cliente['Telefono'], $cliente['Cedula'], $cliente['Correo'], $id);
        return $stmt->execute();
    }

    public function eliminarCliente($id) {
        $sql = "DELETE FROM clientes WHERE idClientes = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
