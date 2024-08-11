<?php
require_once 'config.php';

$conexion = new ClaseConectar();
if ($conexion->ProcedimientoParaConectar()) {
    echo "Conexión exitosa a la base de datos.";
} else {
    echo "Error en la conexión a la base de datos.";
}
?>
