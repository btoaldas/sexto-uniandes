<?php
$servername = "127.0.0.1";
$username = "easy";
$password = "Signature2024";
$dbname = "animal_classification";

// Ruta al archivo de credenciales de la cuenta de servicio
putenv('GOOGLE_APPLICATION_CREDENTIALS=C:\\xampp\\htdocs\\animal_classifier\\credentials\\uniandes-429019-2374656ca0e1.json');

// Crear conexión a la base de datos de clasificación
$conn1 = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn1->connect_error) {
    die("Conexión fallida: " . $conn1->connect_error);
}

// Activar modo de desarrollo (simulación de respuesta)
$development_mode = false; // Cambia a false para usar la API real

// Respuesta simulada para pruebas sin consulta real a la API
$mock_response = [
    "predictions" => [
        [
            "displayNames" => ["frisona", "frisona2"],
            "confidences" => [0.9, 0.7]
        ]
    ]
];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si es una imagen real
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }

    // Verificar si el archivo ya existe
    if (file_exists($target_file)) {
        echo "Lo siento, el archivo ya existe.";
        $uploadOk = 0;
    }

    // Permitir ciertos formatos de archivo
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Lo siento, solo se permiten archivos JPG, JPEG y PNG.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk es 0 por un error
    if ($uploadOk == 0) {
        echo "Lo siento, tu archivo no fue subido.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $filename = basename($_FILES["image"]["name"]);
            $filepath = $target_file;

            // Lógica para usar modo desarrollo o API real
            if ($development_mode) {
                $response_data = $mock_response; // Usar respuesta simulada
            } else {
                // Llamar a la API de Vertex AI para clasificar la imagen
                $vertex_ai_endpoint = "https://us-central1-aiplatform.googleapis.com/v1/projects/50663832811/locations/us-central1/endpoints/1791709173042380800:predict";
                $image_data = base64_encode(file_get_contents($filepath));

                $json_data = json_encode([
                    "instances" => [
                        ["content" => $image_data]
                    ]
                ]);

                // Obtener el token de acceso usando las credenciales de la cuenta de servicio
                $access_token = shell_exec('gcloud auth application-default print-access-token');
                if ($access_token === null) {
                    die("No se pudo obtener el token de acceso. Asegúrate de que gcloud esté instalado y configurado correctamente.");
                }
                $access_token = trim($access_token);

                $ch = curl_init($vertex_ai_endpoint);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Content-Type: application/json",
                    "Authorization: Bearer $access_token"
                ]);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
                $response = curl_exec($ch);
                curl_close($ch);

                // Verificar si hay errores en la respuesta
                if ($response === false) {
                    echo "No se pudo obtener una respuesta válida de la API.";
                } else {
                    $response_data = json_decode($response, true);
                }

                // Agregar depuración para la respuesta de la API (inicialmente oculto)
                echo '<div id="debug-section" style="display: none;">';
                echo "<pre>";
                print_r($response_data);
                echo "</pre>";
                echo '</div>';

                // Botón para mostrar/ocultar la depuración
                echo '<button id="toggle-debug" class="btn btn-secondary mt-3">Mostrar procesamiento de análisis</button>';
?>
                <!-- Script para mostrar/ocultar la depuración -->
                <script>
                    document.getElementById('toggle-debug').addEventListener('click', function() {
                        var debugSection = document.getElementById('debug-section');
                        if (debugSection.style.display === 'none') {
                            debugSection.style.display = 'block';
                            this.innerText = 'Ocultar procesamiento de análisis';
                        } else {
                            debugSection.style.display = 'none';
                            this.innerText = 'Mostrar procesamiento de análisis';
                        }
                    });
                </script>
<?php
            }

            // Procesar la respuesta (real o simulada)
            if (isset($response_data['predictions']) && !empty($response_data['predictions'])) {
                // Extraer el nombre con la mayor confianza
                $predictions = $response_data['predictions'][0];
                $max_confidence_index = array_search(max($predictions['confidences']), $predictions['confidences']);
                $classification = $predictions['displayNames'][$max_confidence_index];

                // Obtener las recomendaciones para el tipo de vaca
                $stmt = $conn1->prepare("SELECT milk_yield, water_and_medicine, forage_and_medicine FROM recommendations WHERE cow_type = ?");
                $stmt->bind_param("s", $classification);
                $stmt->execute();
                $stmt->bind_result($milk_yield, $water_and_medicine, $forage_and_medicine);
                $stmt->fetch();
                $stmt->close();

                // Mostrar la información del análisis
                echo '<div class="card-header bg-primary text-white text-center">';
                echo '<h2>El Ganado que tienes es de raza: ' . htmlspecialchars($classification) . '</h2>';
                echo '</div>';

                echo '<div class="card-body text-center">';
                echo '<center><img src="ia/' . htmlspecialchars($filepath) . '" alt="Imagen del producto" style="max-width: 100%; height: auto;"></center>';
                echo '</div>';

                echo '<div class="card-body">';
                echo '<table class="table table-striped">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Producción de leche</th>';
                echo '<th>Agua y medicina</th>';
                echo '<th>Forraje y medicina</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr>';
                echo '<td>' . htmlspecialchars($milk_yield) . '</td>';
                echo '<td>' . htmlspecialchars($water_and_medicine) . '</td>';
                echo '<td>' . htmlspecialchars($forage_and_medicine) . '</td>';
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';
                echo '</div>';

               

                // Conectar a la base de datos de inventario y mostrar productos
                include '../../proyecto-integrador/php/conexion.php';
               // Consultar tres productos aleatorios de diferentes tablas
$query = "
SELECT producto, precio, existencia FROM cercado 
UNION ALL
SELECT producto, precio, existencia FROM ordeño
UNION ALL
SELECT producto, precio, existencia FROM pasturas
UNION ALL
SELECT producto, precio, existencia FROM riego
ORDER BY RAND() LIMIT 3";

$stmt = $pdo->query($query);

if ($stmt->rowCount() > 0) {
    echo '<div class="mt-5">';
    echo '<h3>En base a tu información, miremos estos productos recomendados que tenemos en stock para ti:</h3>';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Producto</th>';
    echo '<th>Precio</th>';
    echo '<th>Stock</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['producto']) . '</td>';
        echo '<td>' . htmlspecialchars($row['precio']) . '</td>';
        echo '<td>' . htmlspecialchars($row['existencia']) . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '<div class="card-footer bg-light text-center">';
    echo '<center><p>¡Compre con nosotros, sabemos lo que hacemos!</p></center>';
    echo '</div>';
    echo '</div>';
} else {
    echo '<p>No hay productos disponibles en este momento.</p>';
}
            } else {
                echo '<div class="alert alert-danger" role="alert">La respuesta de la API no contiene predicciones.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Lo siento, hubo un error al subir tu archivo.</div>';
        }
    }
}

$conn1->close();
?>
