<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once('../models/iva.model.php');
error_reporting(0);
$iva = new Iva;

switch ($_GET["op"]) {
    // TODO: Operaciones de productos

    case 'todos': // Procedimiento para cargar todos
        $datos = array();
        $datos = $iva->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    default:
        echo json_encode(["error" => "Invalid operation."]);
        break;
}