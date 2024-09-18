<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Content-Type: application/json; charset=UTF-8");

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once('../models/autores.model.php');
error_reporting(0);

$autor = new Autor();

switch ($_GET["op"]) {
    case 'todos': // Obtener todos los autores
        $datos = array();
        $datos = $autor->todos();
        $autores = [];
        while ($row = mysqli_fetch_assoc($datos)) {
            $autores[] = array_map('utf8_encode', $row);
        }
        echo json_encode($autores);
        break;

    case 'uno': // Obtener un autor por ID
        if (!isset($_POST["autor_id"])) {
            echo json_encode(["error" => "Author ID not specified."]);
            exit();
        }
        $autor_id = intval($_POST["autor_id"]);
        $datos = array();
        $datos = $autor->uno($autor_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar': // Insertar un nuevo autor
        if (!isset($_POST["nombre"]) || !isset($_POST["apellido"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }

        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $nacionalidad = $_POST["nacionalidad"];

        $datos = $autor->insertar($nombre, $apellido, $fecha_nacimiento, $nacionalidad);
        echo json_encode($datos);
        break;

    case 'actualizar': // Actualizar un autor
        if (!isset($_POST["autor_id"]) || !isset($_POST["nombre"]) || !isset($_POST["apellido"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }

        $autor_id = intval($_POST["autor_id"]);
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $nacionalidad = $_POST["nacionalidad"];

        $datos = $autor->actualizar($autor_id, $nombre, $apellido, $fecha_nacimiento, $nacionalidad);
        echo json_encode($datos);
        break;

    case 'eliminar': // Eliminar un autor
        if (!isset($_POST["autor_id"])) {
            echo json_encode(["error" => "Author ID not specified."]);
            exit();
        }
        $autor_id = intval($_POST["autor_id"]);
        $datos = $autor->eliminar($autor_id);
        echo json_encode($datos);
        break;

    default:
        echo json_encode(["error" => "Invalid operation."]);
        break;
}
?>
