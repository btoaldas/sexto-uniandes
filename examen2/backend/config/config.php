<?php
class ClaseConectar
{
    public $conexion;
    protected $db;
    private $host = "127.0.0.1";
    private $usuario = "root";
    private $pass = "root";
    private $base = "biblioteca";
    
    public function ProcedimientoParaConectar()
    {
        $this->conexion = mysqli_connect($this->host, $this->usuario, $this->pass, $this->base);
        mysqli_set_charset($this->conexion, "utf8"); // Asegurar que la conexión use UTF-8
        if ($this->conexion->connect_error) {
            die("Error al conectar con el servidor: " . $this->conexion->connect_error);
        }
        $this->db = $this->conexion;
        if ($this->db == false) die("Error al conectar con la base de datos: " . $this->conexion->connect_error);

        return $this->conexion;
    }
}

?>
