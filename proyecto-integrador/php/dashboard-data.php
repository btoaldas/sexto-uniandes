<?php
header('Content-Type: application/json');

$servername = "localhost";  // Cambia si tu servidor es otro
$username = "root";         // Cambia si tu usuario de MySQL es otro
$password = "root";         // Cambia si tu contraseña de MySQL es otra
$dbname = "proyecto_integrador_6_uniandes";  // Nombre de tu base de datos

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(['error' => 'Conexión fallida: ' . $e->getMessage()]));
}

// Función para obtener datos del dashboard
function getDashboardData() {
    global $pdo;
    $data = array();

    // Total de usuarios registrados
    $sql = "SELECT COUNT(*) as total_users FROM usuarios";
    $stmt = $pdo->query($sql);
    $data['total_users'] = $stmt->fetchColumn();

    // Total de productos por categoría
    $categories = ['pasturas', 'ordeño', 'riego', 'cercado'];
    foreach ($categories as $category) {
        $sql = "SELECT COUNT(*) as total FROM `$category`";
        $stmt = $pdo->query($sql);
        $data["total_$category"] = $stmt->fetchColumn();
    }

    // Valor total del inventario
    $sql = "SELECT SUM(Precio * Existencia) as total_value FROM (
        SELECT Precio, Existencia FROM pasturas
        UNION ALL
        SELECT Precio, Existencia FROM `ordeño`
        UNION ALL
        SELECT Precio, Existencia FROM riego
        UNION ALL
        SELECT Precio, Existencia FROM cercado
    ) as all_products";
    $stmt = $pdo->query($sql);
    $data['total_inventory_value'] = floatval($stmt->fetchColumn());

    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode(getDashboardData());
} else {
    echo json_encode(['error' => 'Método no válido']);
}
?>
