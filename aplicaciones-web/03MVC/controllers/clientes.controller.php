<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de clientes

require_once '../models/clientes.model.php';

error_reporting(0);

class ClientesController {
    public function todos() {
        $clientesModel = new ClientesModel();
        return $clientesModel->obtenerTodosLosClientes();
    }

    public function crear($cliente) {
        $clientesModel = new ClientesModel();
        return $clientesModel->insertarCliente($cliente);
    }

    public function actualizar($id, $cliente) {
        $clientesModel = new ClientesModel();
        return $clientesModel->actualizarCliente($id, $cliente);
    }

    public function eliminar($id) {
        $clientesModel = new ClientesModel();
        return $clientesModel->eliminarCliente($id);
    }
}
?>
