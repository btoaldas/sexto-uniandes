<?php
require 'vendor/autoload.php';

use Google\Cloud\AIPlatform\V1\PredictionServiceClient;
use Google\ApiCore\ApiException;
use Google\Cloud\AIPlatform\V1\EndpointName;

// Habilitar el modo de desarrollo para evitar el uso de la API
$development_mode = true; // Cambia a false para usar la API real

// Simulación de una respuesta de la API
$mock_response = [
    "predictions" => [
        ["label" => "vaca", "confidence" => 0.95],
        ["label" => "caballo", "confidence" => 0.80],
    ]
];

if ($development_mode) {
    // Simular la respuesta de la API
    echo "Simulando respuesta de la API (modo desarrollo):\n";
    print_r($mock_response);
} else {
    // Enviar solicitud real a la API de Vertex AI
    try {
        putenv('GOOGLE_APPLICATION_CREDENTIALS=/ruta/al/archivo/uniandes-429019-2374656ca0e1.json');

        $client = new PredictionServiceClient();
        $endpoint = 'projects/50663832811/locations/us-central1/endpoints/989218138925039616';
        $inputs = [];  // Tus datos de entrada aquí

        // Realizar predicción
        $response = $client->predict($endpoint, $inputs);
        print_r($response->getPredictions());
    } catch (ApiException $e) {
        echo "Error al consultar la API: " . $e->getMessage();
    }
}
