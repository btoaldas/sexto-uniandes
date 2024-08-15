<?php
//TODO: Esta clase se encarga de manejar la conexión a la base de datos
class ClaseConectar
{
    public $conexion; //TODO: Aquí guardamos la conexión a la base de datos
    protected $db; //TODO: Esta variable es para almacenar la conexión ya establecida con la base de datos
    private $host = "localhost"; //TODO: Este es el host de la base de datos, o sea, el servidor donde está la BD
    private $usuario = "sexto";  //TODO: El usuario que tiene acceso a la base de datos
    private $pass = "sexto";  //TODO: La clave que corresponde al usuario de la base de datos
    private $base = "gestion_proyectos"; //TODO: El nombre de la base de datos que vamos a utilizar

    //TODO: Este método se encarga de hacer la conexión a la base de datos
    public function ProcedimientoParaConectar()
    {
        $this->conexion = mysqli_connect($this->host, $this->usuario, $this->pass, $this->base); //TODO: Aquí hacemos la conexión a la base de datos usando los datos que ya definimos
        mysqli_query($this->conexion, "SET NAMES 'utf8'"); //TODO: Con esto le decimos a la base que trabaje con caracteres UTF-8 (para que no se dañe con tildes y esas cosas)
        if ($this->conexion->connect_error) { //TODO: Chequeamos si hubo algún error al conectar
            die("Error al conectar con el servidor: " . $this->conexion->connect_error); //TODO: Si algo salió mal, mostramos un mensaje y detenemos todo
        }
        $this->db = $this->conexion; //TODO: Si todo salió bien, guardamos la conexión en $db para usarla más tarde
        if ($this->db == false) die("Error al conectar con la base de datos: " . $this->conexion->connect_error); //TODO: Aquí volvemos a chequear por errores específicos de la base de datos y paramos si hay algo mal

        return $this->conexion; //TODO: Al final, devolvemos la conexión para que se pueda usar en otras partes del código
    }
}
?>
