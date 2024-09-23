<?php
// Prueba para obtener el token de acceso
$access_token = shell_exec('gcloud auth application-default print-access-token');
if ($access_token === null) {
    die("Failed to obtain access token. Make sure gcloud is installed and configured correctly.");
}
$access_token = trim($access_token);
echo "Access Token: " . htmlspecialchars($access_token);
?>
