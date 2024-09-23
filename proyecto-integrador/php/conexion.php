<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "proyecto_integrador_6_uniandes"; 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexión fallida: ' . $e->getMessage();
}
?>
