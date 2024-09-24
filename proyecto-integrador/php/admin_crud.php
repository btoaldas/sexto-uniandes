<?php
// Inicio de captura de salida
ob_start();

// Configuración de encabezados y manejo de errores
header('Content-Type: application/json');
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

// Función para enviar respuesta JSON
function sendJsonResponse($success, $message, $data = null) {
    $response = json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    
    // Limpiar cualquier salida anterior
    ob_clean();
    
    echo $response;
    exit;
}

function debug_log($message) {
    error_log(date('[Y-m-d H:i:s] ') . $message . "\n", 3, 'debug.log');
}

// Manejo de errores globales
set_exception_handler(function($e) {
    debug_log("Excepción no capturada: " . $e->getMessage());
    sendJsonResponse(false, 'Error interno del servidor: ' . $e->getMessage());
});

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "proyecto_integrador_6_uniandes";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
debug_log("Solicitud recibida: " . json_encode($_POST));

if ($conn->connect_error) {
    debug_log("Error de conexión: " . $conn->connect_error);
    sendJsonResponse(false, 'Connection failed: ' . $conn->connect_error);
}

// Obtención de parámetros
$action = $_POST['action'] ?? '';
$table = $_POST['table'] ?? '';

debug_log("Acción: $action, Tabla: $table");
// $table = "ordeño";
// Procesamiento de la acción
switch ($action) {
    case 'read':
        $codigo_barras = $_POST['codigo_barras'] ?? null;
        if ($codigo_barras) {
            $sql = "SELECT * FROM $table WHERE codigo_barras = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $codigo_barras);
        } else {
            $sql = "SELECT * FROM $table";
            $stmt = $conn->prepare($sql);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        sendJsonResponse(true, 'Datos leídos con éxito', $data);
        break;
        
        case 'create':
            $data = json_decode($_POST['data'], true);
            if (!$data) {
                sendJsonResponse(false, 'Datos de producto inválidos');
            }
            debug_log("Intentando crear: tabla=$table, data=" . json_encode($data));
        
            // Verificar si se proporcionó un código de barras
            if (!isset($data['codigo_barras']) || empty($data['codigo_barras'])) {
                // Generar un código de barras único
                $data['codigo_barras'] = uniqid('PROD_', true);
            }
        
            $columns = [];
            $values = [];
            $types = "";
            foreach ($data as $key => $value) {
                $columns[] = $key;
                $values[] = $value;
                $types .= "s";
            }
            $columnsStr = implode(", ", $columns);
            $placeholders = implode(", ", array_fill(0, count($values), "?"));
            $sql = "INSERT INTO $table ($columnsStr) VALUES ($placeholders)";
            debug_log("SQL: $sql");
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                debug_log("Error en la preparación de la declaración: " . $conn->error);
                sendJsonResponse(false, 'Error en la preparación: ' . $conn->error);
            }
            $stmt->bind_param($types, ...$values);
            if ($stmt->execute()) {
                debug_log("Creación exitosa");
                sendJsonResponse(true, 'Nuevo registro creado con éxito', ['codigo_barras' => $data['codigo_barras']]);
            } else {
                debug_log("Error en la creación: " . $stmt->error);
                sendJsonResponse(false, 'Error: ' . $stmt->error);
            }
            break;

            case 'update':
                $codigo_barras = $_POST['codigo_barras'];  // Obtenemos el código de barras
            
                // Decodificamos el JSON recibido en el campo "data"
                $data = json_decode($_POST['data'], true);
                
                // Asegurarse de que $data contiene los valores esperados
                if (!$data || !is_array($data)) {
                    sendJsonResponse(false, 'Datos inválidos para actualizar.');
                    break;
                }
            
                // Inicializamos las variables
                $set = [];
                $values = [];
                $types = "";
            
                // Recopilamos los campos que se actualizarán
                foreach ($data as $key => $value) {
                    // Nos aseguramos de que no haya valores vacíos o nulos
                    if (!empty($value)) {
                        $set[] = "$key = ?";  // Solo incluimos los campos con valores válidos
                        $values[] = $value;  
                        $types .= "s";  // Tipo cadena para cada valor (asumimos que todos son strings)
                    }
                }
            
                // Log para depurar los valores que se están usando en la consulta
                error_log("setStr: " . implode(", ", $set));  // Muestra los campos que se están actualizando
                error_log("values: " . json_encode($values));  // Muestra los valores que se están pasando
            
                // Si no hay campos para actualizar, no ejecutamos la consulta
                if (empty($set)) {
                    sendJsonResponse(false, 'No se proporcionaron valores para actualizar.');
                    break;
                }
            
                // Añadimos el codigo_barras como parámetro para el WHERE
                $values[] = $codigo_barras;  // El codigo_barras se usa para la cláusula WHERE
                $types .= "s";  // Código de barras es también una cadena (VARCHAR)
            
                // Construimos la consulta SQL
                $setStr = implode(", ", $set);  // Unimos los campos en una sola cadena
                $sql = "UPDATE $table SET $setStr WHERE Codigo_barras = ?";
            
                // Ejecutar la declaración preparada
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    sendJsonResponse(false, 'Error al preparar la consulta: ' . $conn->error);
                    break;
                }
            
                $stmt->bind_param($types, ...$values);
                if ($stmt->execute()) {
                    sendJsonResponse(true, 'Registro actualizado con éxito');
                } else {
                    sendJsonResponse(false, 'Error al actualizar el registro: ' . $stmt->error);
                }
                break;
            
            

        case 'delete':
            $codigo_barras = $_POST['codigo_barras'];
            error_log("Intentando eliminar: tabla=$table, codigo_barras=$codigo_barras");
            $sql = "DELETE FROM $table WHERE codigo_barras = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $codigo_barras);
            if ($stmt->execute()) {
                error_log("Eliminación exitosa");
                echo json_encode(['success' => true, 'message' => 'Registro eliminado con éxito']);
            } else {
                error_log("Error en la eliminación: " . $stmt->error);
                echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
            
            
            }
            break;
    }
    
    $conn->close();
    ?>

    