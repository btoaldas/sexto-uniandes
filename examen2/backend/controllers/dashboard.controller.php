<?php
// Incluir la configuración y la conexión a la base de datos
require_once('../config/config.php');

header('Content-Type: application/json');

// Operación a realizar
$op = $_GET['op'];

if ($op === 'total_libros') {
    $sql = "SELECT COUNT(*) as total FROM Libros";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data['total']);
}

if ($op === 'total_autores') {
    $sql = "SELECT COUNT(*) as total FROM Autores";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data['total']);
}

if ($op === 'promedio_libros') {
    $sql = "SELECT AVG(cantidad) as promedio FROM (SELECT COUNT(*) as cantidad FROM Libros GROUP BY autor_id) as subquery";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data['promedio']);
}

if ($op === 'total_categorias') {
    $sql = "SELECT COUNT(DISTINCT genero) as total FROM Libros";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data['total']);
}
?>
