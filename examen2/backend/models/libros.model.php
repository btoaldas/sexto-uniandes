<?php
require_once('../config/config.php');

class Libro {

    // Obtener todos los libros
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();

        $sql = "SELECT * FROM Libros";
        $datos = mysqli_query($con, $sql);
        $con->close(); // Cerrar la conexión después de usarla
        return $datos;
    }

    // Obtener un libro por ID
    public function uno($libro_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();

        $sql = "SELECT * FROM Libros WHERE libro_id = $libro_id";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }

    // Insertar un nuevo libro
    public function insertar($titulo, $genero, $fecha_publicacion, $isbn, $autor_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();

        $sql = "INSERT INTO Libros (titulo, genero, fecha_publicacion, isbn, autor_id) 
                VALUES ('$titulo', '$genero', '$fecha_publicacion', '$isbn', '$autor_id')";
        if (mysqli_query($con, $sql)) {
            $id = mysqli_insert_id($con);
            $con->close();
            return $id; // Devuelve el ID del libro insertado
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

    // Actualizar un libro
    public function actualizar($libro_id, $titulo, $genero, $fecha_publicacion, $isbn, $autor_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();

        $sql = "UPDATE Libros 
                SET titulo = '$titulo', genero = '$genero', fecha_publicacion = '$fecha_publicacion', isbn = '$isbn', autor_id = '$autor_id'
                WHERE libro_id = $libro_id";
        if (mysqli_query($con, $sql)) {
            $con->close();
            return $libro_id; // Devuelve el ID del libro actualizado
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

    // Eliminar un libro
    public function eliminar($libro_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();

        $sql = "DELETE FROM Libros WHERE libro_id = $libro_id";
        if (mysqli_query($con, $sql)) {
            $con->close();
            return 1; // Éxito
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }

    public function reporte() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
    
        // Consulta que une los libros con los autores y ordena por libro_id
        $sql = "SELECT l.libro_id, l.titulo, l.genero, l.fecha_publicacion, l.isbn, a.autor_id, a.nombre, a.apellido
                FROM Libros l
                JOIN Autores a ON l.autor_id = a.autor_id
                ORDER BY l.libro_id ASC";  // Aquí añadimos ORDER BY para ordenar por libro_id ascendente
                    
        $datos = mysqli_query($con, $sql);
        $con->close(); // Cerrar la conexión después de usarla
        return $datos;
    }
    
}
?>
