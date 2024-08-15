<?php
//TODO: Estos encabezados permiten el acceso a la API desde cualquier origen, o sea, se puede usar desde cualquier dominio
header("Access-Control-Allow-Origin: *");
//TODO: Aquí estamos permitiendo varios tipos de encabezados que puedan ser enviados a la API, como X-API-KEY y otros
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
//TODO: Permitir diferentes métodos HTTP para la API, como GET, POST, PUT, DELETE, etc.
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
//TODO: Declarar explícitamente qué métodos HTTP están permitidos
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER["REQUEST_METHOD"]; //TODO: Obtener el método HTTP que se usó en la solicitud, como GET o POST
if ($method == "OPTIONS") {
    die(); //TODO: Si el método es OPTIONS (una solicitud preliminar), detenemos la ejecución
}

require_once('../models/asignaciones.model.php'); //TODO: Incluir el archivo que contiene la clase Asignaciones
$asignaciones = new Asignaciones(); //TODO: Crear una instancia de la clase Asignaciones para poder usar sus métodos

switch ($_GET["op"]) { //TODO: Dependiendo de la operación solicitada, ejecutamos el caso correspondiente
    case 'todos': //TODO: Caso para obtener todas las asignaciones
        // Ejemplo de uso en la URL para obtener todas las asignaciones:
        // URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/asignaciones.controller.php?op=todos
        // Método: GET
        // Descripción: Este endpoint devuelve todas las asignaciones en formato JSON.
        // Ejemplo de respuesta en JSON:
        // [
        //   {"asignacion_id": 1, "proyecto_id": 1, "empleado_id": 1, "fecha_asignacion": "2024-01-15"},
        //   {"asignacion_id": 2, "proyecto_id": 2, "empleado_id": 2, "fecha_asignacion": "2024-02-10"}
        // ]
        $datos = $asignaciones->todos(); //TODO: Llamar al método todos del modelo Asignaciones para obtener todas las filas
        $todos = []; //TODO: Crear un arreglo vacío para almacenar los datos
        while ($row = mysqli_fetch_assoc($datos)) { //TODO: Recorrer todas las filas devueltas y agregarlas al arreglo
            $todos[] = $row;
        }
        echo json_encode($todos); //TODO: Convertir el arreglo a formato JSON para enviarlo como respuesta
        break;

    case 'uno': //TODO: Caso para obtener una sola asignación por su ID
        // Ejemplo de uso en la URL para obtener una asignación específica:
        // URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/asignaciones.controller.php?op=uno
        // Método: POST
        // Parámetro: 'asignacion_id' (ID de la asignación)
        // Ejemplo en Postman:
        // 1. Seleccionar método POST.
        // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/asignaciones.controller.php?op=uno
        // 3. Body -> x-www-form-urlencoded -> asignacion_id=1
        // Descripción: Este endpoint devuelve una asignación específica en formato JSON.
        // Ejemplo de respuesta en JSON:
        // {"asignacion_id": 1, "proyecto_id": 1, "empleado_id": 1, "fecha_asignacion": "2024-01-15"}
        $asignacion_id = $_POST["asignacion_id"]; //TODO: Obtener el ID de la asignación desde los datos enviados en la solicitud
        $datos = $asignaciones->uno($asignacion_id); //TODO: Llamar al método uno del modelo Asignaciones para obtener la fila correspondiente
        $res = mysqli_fetch_assoc($datos); //TODO: Convertir el resultado en un arreglo asociativo
        echo json_encode($res); //TODO: Convertir el arreglo a JSON y enviarlo como respuesta
        break;

    case 'insertar': //TODO: Caso para insertar una nueva asignación
        // Ejemplo de uso en la URL para insertar una nueva asignación:
        // URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/asignaciones.controller.php?op=insertar
        // Método: POST
        // Parámetros: 'proyecto_id', 'empleado_id', 'fecha_asignacion'
        // Ejemplo en Postman:
        // 1. Seleccionar método POST.
        // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/asignaciones.controller.php?op=insertar
        // 3. Body -> x-www-form-urlencoded ->
        //    proyecto_id=1
        //    empleado_id=2
        //    fecha_asignacion=2024-08-20
        // Descripción: Este endpoint inserta una nueva asignación en la base de datos.
        // Ejemplo de respuesta en JSON (si la inserción fue exitosa):
        // {"status": "success", "message": "Asignación creada con éxito", "asignacion_id": 3}
        $proyecto_id = $_POST["proyecto_id"]; //TODO: Obtener el ID del proyecto desde los datos enviados
        $empleado_id = $_POST["empleado_id"]; //TODO: Obtener el ID del empleado desde los datos enviados
        $fecha_asignacion = $_POST["fecha_asignacion"]; //TODO: Obtener la fecha de asignación desde los datos enviados

        $datos = $asignaciones->insertar($proyecto_id, $empleado_id, $fecha_asignacion); //TODO: Llamar al método insertar del modelo Asignaciones para agregar la nueva fila
        echo json_encode($datos); //TODO: Convertir el resultado a JSON y enviarlo como respuesta
        break;

    case 'actualizar': //TODO: Caso para actualizar una asignación existente
        // Ejemplo de uso en la URL para actualizar una asignación existente:
        // URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/asignaciones.controller.php?op=actualizar
        // Método: POST
        // Parámetros: 'asignacion_id', 'proyecto_id', 'empleado_id', 'fecha_asignacion'
        // Ejemplo en Postman:
        // 1. Seleccionar método POST.
        // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/asignaciones.controller.php?op=actualizar
        // 3. Body -> x-www-form-urlencoded ->
        //    asignacion_id=1
        //    proyecto_id=2
        //    empleado_id=3
        //    fecha_asignacion=2024-09-15
        // Descripción: Este endpoint actualiza los detalles de una asignación existente.
        // Ejemplo de respuesta en JSON (si la actualización fue exitosa):
        // {"status": "success", "message": "Asignación actualizada con éxito"}
        $asignacion_id = $_POST["asignacion_id"]; //TODO: Obtener el ID de la asignación a actualizar
        $proyecto_id = $_POST["proyecto_id"]; //TODO: Obtener el nuevo ID del proyecto
        $empleado_id = $_POST["empleado_id"]; //TODO: Obtener el nuevo ID del empleado
        $fecha_asignacion = $_POST["fecha_asignacion"]; //TODO: Obtener la nueva fecha de asignación

        $datos = $asignaciones->actualizar($asignacion_id, $proyecto_id, $empleado_id, $fecha_asignacion); //TODO: Llamar al método actualizar del modelo Asignaciones para modificar la fila
        echo json_encode($datos); //TODO: Convertir el resultado a JSON y enviarlo como respuesta
        break;

    case 'eliminar': //TODO: Caso para eliminar una asignación
        // Ejemplo de uso en la URL para eliminar una asignación:
        // URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/asignaciones.controller.php?op=eliminar
        // Método: POST
        // Parámetro: 'asignacion_id'
        // Ejemplo en Postman:
        // 1. Seleccionar método POST.
        // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/asignaciones.controller.php?op=eliminar
        // 3. Body -> x-www-form-urlencoded -> asignacion_id=1
        // Descripción: Este endpoint elimina una asignación de la base de datos.
        // Ejemplo de respuesta en JSON (si la eliminación fue exitosa):
        // {"status": "success", "message": "Asignación eliminada con éxito"}
        $asignacion_id = $_POST["asignacion_id"]; //TODO: Obtener el ID de la asignación a eliminar
        $datos = $asignaciones->eliminar($asignacion_id); //TODO: Llamar al método eliminar del modelo Asignaciones para borrar la fila
        echo json_encode($datos); //TODO: Convertir el resultado a JSON y enviarlo como respuesta
        break;
}
?>
