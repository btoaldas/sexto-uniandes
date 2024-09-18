<?php
require_once('../config/config.php');

class Autor {

    // Obtener todos los autores
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "SELECT * FROM Autores";
        $datos = mysqli_query($con, $sql);
        $con->close(); // Cerrar la conexión después de usarla
        return $datos;
    }

    // Obtener un autor por ID
    public function uno($autor_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "SELECT * FROM Autores WHERE autor_id = $autor_id";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }

    // Insertar un nuevo autor
    public function insertar($nombre, $apellido, $fecha_nacimiento, $nacionalidad) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "INSERT INTO Autores (nombre, apellido, fecha_nacimiento, nacionalidad) 
                VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$nacionalidad')";
        if (mysqli_query($con, $sql)) {
            $id = mysqli_insert_id($con);
            $con->close();
            return $id; // Devuelve el ID del autor insertado
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

    // Actualizar un autor
    public function actualizar($autor_id, $nombre, $apellido, $fecha_nacimiento, $nacionalidad) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "UPDATE Autores 
                SET nombre = '$nombre', apellido = '$apellido', fecha_nacimiento = '$fecha_nacimiento', nacionalidad = '$nacionalidad' 
                WHERE autor_id = $autor_id";
        if (mysqli_query($con, $sql)) {
            $con->close();
            return $autor_id; // Devuelve el ID del autor actualizado
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

    // Eliminar un autor
    public function eliminar($autor_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        mysqli_set_charset($con, "utf8");
        $sql = "DELETE FROM Autores WHERE autor_id = $autor_id";
        if (mysqli_query($con, $sql)) {
            $con->close();
            return 1; // Éxito
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }
}
?>
