<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "proyecto_integrador_6_uniandes";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(['error' => 'Conexión fallida: ' . $e->getMessage()]));
}

function getDashboardData() {
    global $pdo;
    $data = array();

    // Total de usuarios registrados
    $sql = "SELECT COUNT(*) as total_users FROM usuarios";
    $stmt = $pdo->query($sql);
    $data['total_users'] = $stmt->fetchColumn();

    // Total de productos por categoría y existencias por categoría
    $categories = ['pasturas', 'ordeño', 'riego', 'cercado'];
    foreach ($categories as $category) {
        // Total de productos
        $sql = "SELECT COUNT(*) as total FROM `$category`";
        $stmt = $pdo->query($sql);
        $data["total_$category"] = $stmt->fetchColumn();

        // Total de existencias
        $sql = "SELECT SUM(Existencia) as total_stock FROM `$category`";
        $stmt = $pdo->query($sql);
        $data["total_stock_$category"] = $stmt->fetchColumn();

        // Precios y existencias por categoría
        $sql = "SELECT Precio, Existencia FROM `$category`";
        $stmt = $pdo->query($sql);
        $data["prices_and_stock_$category"] = $stmt->fetchAll(PDO::FETCH_ASSOC);

      


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

        // Producto más caro de cada categoría
       
            $sql = "SELECT Producto, MAX(Precio) as max_price FROM `$category`";
            $stmt = $pdo->query($sql);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $data["top_{$category}_product"] = $row['Producto'];
            $data["top_{$category}_price"] = floatval($row['max_price']);

              // Valor total del inventario por categoría
        $sql = "SELECT SUM(Precio * Existencia) as total_value FROM `$category`";
        $stmt = $pdo->query($sql);
        $data["value_$category"] = floatval($stmt->fetchColumn());
      
    }

    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode(getDashboardData());
} else {
    echo json_encode(['error' => 'Método no válido']);
}
?>
