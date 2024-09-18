<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once('../models/libros.model.php');
error_reporting(0);

$libro = new Libro();

switch ($_GET["op"]) {
    case 'todos': // Obtener todos los libros
        $datos = array();
        $datos = $libro->todos();
        $libros = [];
        while ($row = mysqli_fetch_assoc($datos)) {
            $libros[] = $row;
        }
        echo json_encode($libros);
        break;

    case 'uno': // Obtener un libro por ID
        if (!isset($_POST["libro_id"])) {
            echo json_encode(["error" => "Book ID not specified."]);
            exit();
        }
        $libro_id = intval($_POST["libro_id"]);
        $datos = array();
        $datos = $libro->uno($libro_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar': // Insertar un nuevo libro
        if (!isset($_POST["titulo"]) || !isset($_POST["autor_id"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }

        $titulo = $_POST["titulo"];
        $genero = $_POST["genero"];
        $fecha_publicacion = $_POST["fecha_publicacion"];
        $isbn = $_POST["isbn"];
        $autor_id = intval($_POST["autor_id"]);

        $datos = $libro->insertar($titulo, $genero, $fecha_publicacion, $isbn, $autor_id);
        echo json_encode($datos);
        break;

    case 'actualizar': // Actualizar un libro
        if (!isset($_POST["libro_id"]) || !isset($_POST["titulo"]) || !isset($_POST["autor_id"])) {
            echo json_encode(["error" => "Missing required parameters."]);
            exit();
        }

        $libro_id = intval($_POST["libro_id"]);
        $titulo = $_POST["titulo"];
        $genero = $_POST["genero"];
        $fecha_publicacion = $_POST["fecha_publicacion"];
        $isbn = $_POST["isbn"];
        $autor_id = intval($_POST["autor_id"]);

        $datos = $libro->actualizar($libro_id, $titulo, $genero, $fecha_publicacion, $isbn, $autor_id);
        echo json_encode($datos);
        break;

    case 'eliminar': // Eliminar un libro
        if (!isset($_POST["libro_id"])) {
            echo json_encode(["error" => "Book ID not specified."]);
            exit();
        }
        $libro_id = intval($_POST["libro_id"]);
        $datos = $libro->eliminar($libro_id);
        echo json_encode($datos);
        break;

    default:
        echo json_encode(["error" => "Invalid operation."]);
        break;
}
?>
