<?php
//TODO: Incluir el archivo de configuración para la conexión a la base de datos
require_once('../config/config.php');

//TODO: Clase para manejar las operaciones de la tabla Proyectos
class Proyectos
{
    //TODO: Método para obtener todos los proyectos
    // Descripción: Este endpoint devuelve todos los proyectos en formato JSON.
    public function todos()
    {
        $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
        $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
        $cadena = "SELECT * FROM Proyectos"; //TODO: Definir la consulta SQL para obtener todos los proyectos
        $datos = mysqli_query($con, $cadena); //TODO: Ejecutar la consulta
        $con->close(); //TODO: Cerrar la conexión
        return $datos; //TODO: Retornar los datos obtenidos
    }

    //TODO: Método para obtener un proyecto por su ID
    // Descripción: Este endpoint devuelve un proyecto específico en formato JSON.
    public function uno($proyecto_id)
    {
        $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
        $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
        $cadena = "SELECT * FROM  `proyectos` WHERE `proyecto_id` =$proyecto_id"; //TODO: Definir la consulta SQL para obtener un proyecto específico
        $datos = mysqli_query($con, $cadena); //TODO: Ejecutar la consulta
        $con->close(); //TODO: Cerrar la conexión
        return $datos; //TODO: Retornar los datos obtenidos
    }

    //TODO: Método para insertar un nuevo proyecto
    // Descripción: Este endpoint inserta un nuevo proyecto en la base de datos.
    public function insertar($nombre, $descripcion, $fecha_inicio, $fecha_fin)
    {
        try {
            $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
            $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
            $cadena = "INSERT INTO Proyectos (nombre, descripcion, fecha_inicio, fecha_fin) VALUES ('$nombre', '$descripcion', '$fecha_inicio', '$fecha_fin')"; //TODO: Definir la consulta SQL para insertar un nuevo proyecto
            if (mysqli_query($con, $cadena)) { //TODO: Ejecutar la consulta y verificar si fue exitosa
                return $con->insert_id; //TODO: Retornar el ID del proyecto insertado
            } else {
                return $con->error; //TODO: Retornar el error si ocurrió alguno
            }
        } catch (Exception $th) {
            return $th->getMessage(); //TODO: Manejar excepciones y retornar el mensaje de error
        } finally {
            $con->close(); //TODO: Cerrar la conexión en cualquier caso
        }
    }

    //TODO: Método para actualizar un proyecto existente
    // Descripción: Este endpoint actualiza los detalles de un proyecto existente.
    public function actualizar($proyecto_id, $nombre, $descripcion, $fecha_inicio, $fecha_fin)
    {
        try {
            $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
            $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
            $cadena = "UPDATE Proyectos SET nombre='$nombre', descripcion='$descripcion', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin' WHERE proyecto_id=$proyecto_id"; //TODO: Definir la consulta SQL para actualizar un proyecto
            if (mysqli_query($con, $cadena)) { //TODO: Ejecutar la consulta y verificar si fue exitosa
                return $proyecto_id; //TODO: Retornar el ID del proyecto actualizado
            } else {
                return $con->error; //TODO: Retornar el error si ocurrió alguno
            }
        } catch (Exception $th) {
            return $th->getMessage(); //TODO: Manejar excepciones y retornar el mensaje de error
        } finally {
            $con->close(); //TODO: Cerrar la conexión en cualquier caso
        }
    }

    //TODO: Método para eliminar un proyecto
    // Descripción: Este endpoint elimina un proyecto de la base de datos.
    public function eliminar($proyecto_id)
    {
        try {
            $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
            $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
            $cadena = "DELETE FROM Proyectos WHERE proyecto_id=$proyecto_id"; //TODO: Definir la consulta SQL para eliminar un proyecto
            if (mysqli_query($con, $cadena)) { //TODO: Ejecutar la consulta y verificar si fue exitosa
                return 1; //TODO: Retornar 1 si la eliminación fue exitosa
            } else {
                return $con->error; //TODO: Retornar el error si ocurrió alguno
            }
        } catch (Exception $th) {
            return $th->getMessage(); //TODO: Manejar excepciones y retornar el mensaje de error
        } finally {
            $con->close(); //TODO: Cerrar la conexión en cualquier caso
        }
    }
}
?>
