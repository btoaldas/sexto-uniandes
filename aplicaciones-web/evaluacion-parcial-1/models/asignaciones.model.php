<?php
//TODO: Incluir el archivo de configuración para la conexión a la base de datos
require_once('../config/config.php');

//TODO: Clase para manejar las operaciones de la tabla Asignaciones
class Asignaciones
{
    //TODO: Método para obtener todas las asignaciones
    // Ejemplo en Postman:
    // 1. Seleccionar método GET.
    // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/models/asignaciones.php?op=todos
    // Descripción: Este endpoint devuelve todas las asignaciones en formato JSON.
    public function todos()
    {
        $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
        $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
        $cadena = "SELECT * FROM Asignaciones"; //TODO: Definir la consulta SQL para obtener todas las asignaciones
        $datos = mysqli_query($con, $cadena); //TODO: Ejecutar la consulta
        $con->close(); //TODO: Cerrar la conexión
        return $datos; //TODO: Retornar los datos obtenidos
    }

    //TODO: Método para obtener una asignación por su ID
    // Ejemplo en Postman:
    // 1. Seleccionar método POST.
    // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/models/asignaciones.php?op=uno
    // 3. Body -> x-www-form-urlencoded -> asignacion_id=1
    // Descripción: Este endpoint devuelve una asignación específica en formato JSON.
    public function uno($asignacion_id)
    {
        $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
        $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
        $cadena = "SELECT * FROM Asignaciones WHERE asignacion_id = $asignacion_id"; //TODO: Definir la consulta SQL para obtener una asignación específica
        $datos = mysqli_query($con, $cadena); //TODO: Ejecutar la consulta
        $con->close(); //TODO: Cerrar la conexión
        return $datos; //TODO: Retornar los datos obtenidos
    }

    //TODO: Método para insertar una nueva asignación
    // Ejemplo en Postman:
    // 1. Seleccionar método POST.
    // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/models/asignaciones.php?op=insertar
    // 3. Body -> x-www-form-urlencoded ->
    //    proyecto_id=2
    //    empleado_id=3
    //    fecha_asignacion=2024-08-20
    // Descripción: Este endpoint inserta una nueva asignación en la base de datos.
    public function insertar($proyecto_id, $empleado_id, $fecha_asignacion)
    {
        try {
            $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
            $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
            $cadena = "INSERT INTO Asignaciones (proyecto_id, empleado_id, fecha_asignacion) VALUES ('$proyecto_id', '$empleado_id', '$fecha_asignacion')"; //TODO: Definir la consulta SQL para insertar una nueva asignación
            if (mysqli_query($con, $cadena)) { //TODO: Ejecutar la consulta y verificar si fue exitosa
                return $con->insert_id; //TODO: Retornar el ID de la asignación insertada
            } else {
                return $con->error; //TODO: Retornar el error si ocurrió alguno
            }
        } catch (Exception $th) {
            return $th->getMessage(); //TODO: Manejar excepciones y retornar el mensaje de error
        } finally {
            $con->close(); //TODO: Cerrar la conexión en cualquier caso
        }
    }

    //TODO: Método para actualizar una asignación existente
    // Ejemplo en Postman:
    // 1. Seleccionar método POST.
    // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/models/asignaciones.php?op=actualizar
    // 3. Body -> x-www-form-urlencoded ->
    //    asignacion_id=1
    //    proyecto_id=2
    //    empleado_id=3
    //    fecha_asignacion=2024-09-01
    // Descripción: Este endpoint actualiza los detalles de una asignación existente.
    public function actualizar($asignacion_id, $proyecto_id, $empleado_id, $fecha_asignacion)
    {
        try {
            $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
            $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
            $cadena = "UPDATE Asignaciones SET proyecto_id='$proyecto_id', empleado_id='$empleado_id', fecha_asignacion='$fecha_asignacion' WHERE asignacion_id=$asignacion_id"; //TODO: Definir la consulta SQL para actualizar una asignación
            if (mysqli_query($con, $cadena)) { //TODO: Ejecutar la consulta y verificar si fue exitosa
                return $asignacion_id; //TODO: Retornar el ID de la asignación actualizada
            } else {
                return $con->error; //TODO: Retornar el error si ocurrió alguno
            }
        } catch (Exception $th) {
            return $th->getMessage(); //TODO: Manejar excepciones y retornar el mensaje de error
        } finally {
            $con->close(); //TODO: Cerrar la conexión en cualquier caso
        }
    }

    //TODO: Método para eliminar una asignación
    // Ejemplo en Postman:
    // 1. Seleccionar método POST.
    // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/models/asignaciones.php?op=eliminar
    // 3. Body -> x-www-form-urlencoded -> asignacion_id=1
    // Descripción: Este endpoint elimina una asignación de la base de datos.
    public function eliminar($asignacion_id)
    {
        try {
            $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
            $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
            $cadena = "DELETE FROM Asignaciones WHERE asignacion_id=$asignacion_id"; //TODO: Definir la consulta SQL para eliminar una asignación
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
