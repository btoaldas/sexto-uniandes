<?php
//TODO: Incluir el archivo de configuración para la conexión a la base de datos
require_once('../config/config.php');

//TODO: Clase para manejar las operaciones de la tabla Empleados
class Empleados
{
    //TODO: Método para obtener todos los empleados
    // Ejemplo en Postman:
    // 1. Seleccionar método GET.
    // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/models/empleados.php?op=todos
    // Descripción: Este endpoint devuelve todos los empleados en formato JSON.
    public function todos()
    {
        $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
        $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
        $cadena = "SELECT * FROM Empleados"; //TODO: Definir la consulta SQL para obtener todos los empleados
        $datos = mysqli_query($con, $cadena); //TODO: Ejecutar la consulta
        $con->close(); //TODO: Cerrar la conexión
        return $datos; //TODO: Retornar los datos obtenidos
    }

    //TODO: Método para obtener un empleado por su ID
    // Ejemplo en Postman:
    // 1. Seleccionar método POST.
    // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/models/empleados.php?op=uno
    // 3. Body -> x-www-form-urlencoded -> empleado_id=1
    // Descripción: Este endpoint devuelve un empleado específico en formato JSON.
    public function uno($empleado_id)
    {
        $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
        $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
        $cadena = "SELECT * FROM Empleados WHERE empleado_id = $empleado_id"; //TODO: Definir la consulta SQL para obtener un empleado específico
        $datos = mysqli_query($con, $cadena); //TODO: Ejecutar la consulta
        $con->close(); //TODO: Cerrar la conexión
        return $datos; //TODO: Retornar los datos obtenidos
    }

    //TODO: Método para insertar un nuevo empleado
    // Ejemplo en Postman:
    // 1. Seleccionar método POST.
    // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/models/empleados.php?op=insertar
    // 3. Body -> x-www-form-urlencoded ->
    //    nombre=Pedro
    //    apellido=Lopez
    //    email=pedro.lopez@example.com
    //    posicion=Analista
    // Descripción: Este endpoint inserta un nuevo empleado en la base de datos.
    public function insertar($nombre, $apellido, $email, $posicion)
    {
        try {
            $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
            $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
            $cadena = "INSERT INTO Empleados (nombre, apellido, email, posicion) VALUES ('$nombre', '$apellido', '$email', '$posicion')"; //TODO: Definir la consulta SQL para insertar un nuevo empleado
            if (mysqli_query($con, $cadena)) { //TODO: Ejecutar la consulta y verificar si fue exitosa
                return $con->insert_id; //TODO: Retornar el ID del empleado insertado
            } else {
                return $con->error; //TODO: Retornar el error si ocurrió alguno
            }
        } catch (Exception $th) {
            return $th->getMessage(); //TODO: Manejar excepciones y retornar el mensaje de error
        } finally {
            $con->close(); //TODO: Cerrar la conexión en cualquier caso
        }
    }

    //TODO: Método para actualizar un empleado existente
    // Ejemplo en Postman:
    // 1. Seleccionar método POST.
    // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/models/empleados.php?op=actualizar
    // 3. Body -> x-www-form-urlencoded ->
    //    empleado_id=1
    //    nombre=Carlos
    //    apellido=Ramirez
    //    email=carlos.ramirez@example.com
    //    posicion=Gerente
    // Descripción: Este endpoint actualiza los detalles de un empleado existente.
    public function actualizar($empleado_id, $nombre, $apellido, $email, $posicion)
    {
        try {
            $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
            $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
            $cadena = "UPDATE Empleados SET nombre='$nombre', apellido='$apellido', email='$email', posicion='$posicion' WHERE empleado_id=$empleado_id"; //TODO: Definir la consulta SQL para actualizar un empleado
            if (mysqli_query($con, $cadena)) { //TODO: Ejecutar la consulta y verificar si fue exitosa
                return $empleado_id; //TODO: Retornar el ID del empleado actualizado
            } else {
                return $con->error; //TODO: Retornar el error si ocurrió alguno
            }
        } catch (Exception $th) {
            return $th->getMessage(); //TODO: Manejar excepciones y retornar el mensaje de error
        } finally {
            $con->close(); //TODO: Cerrar la conexión en cualquier caso
        }
    }

    //TODO: Método para eliminar un empleado
    // Ejemplo en Postman:
    // 1. Seleccionar método POST.
    // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/models/empleados.php?op=eliminar
    // 3. Body -> x-www-form-urlencoded -> empleado_id=1
    // Descripción: Este endpoint elimina un empleado de la base de datos.
    public function eliminar($empleado_id)
    {
        try {
            $con = new ClaseConectar(); //TODO: Crear una nueva conexión a la base de datos
            $con = $con->ProcedimientoParaConectar(); //TODO: Establecer la conexión
            $cadena = "DELETE FROM Empleados WHERE empleado_id=$empleado_id"; //TODO: Definir la consulta SQL para eliminar un empleado
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
