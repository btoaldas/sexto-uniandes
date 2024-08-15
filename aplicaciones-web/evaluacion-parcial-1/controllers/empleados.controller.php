<?php
//TODO: Configuración de encabezados para permitir el acceso a la API desde cualquier origen
header("Access-Control-Allow-Origin: *");
//TODO: Permitir varios tipos de encabezados para ser enviados a la API
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
//TODO: Permitir diferentes métodos HTTP para la API, como GET, POST, PUT, DELETE, etc.
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
//TODO: Declarar explícitamente qué métodos HTTP están permitidos
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER["REQUEST_METHOD"]; //TODO: Obtener el método HTTP que se usó en la solicitud, como GET o POST
if ($method == "OPTIONS") {
    die(); //TODO: Si el método es OPTIONS (una solicitud preliminar), detenemos la ejecución
}

require_once('../models/empleados.model.php'); //TODO: Incluir el archivo que contiene la clase Empleados
$empleados = new Empleados(); //TODO: Crear una instancia de la clase Empleados para poder usar sus métodos

switch ($_GET["op"]) { //TODO: Dependiendo de la operación solicitada, ejecutamos el caso correspondiente
    case 'todos': //TODO: Caso para obtener todos los empleados
        // Ejemplo de uso en la URL para obtener todos los empleados:
        // URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/empleados.controller.php?op=todos
        // Método: GET
        // Descripción: Este endpoint devuelve todos los empleados en formato JSON.
        // Ejemplo de respuesta en JSON:
        // [
        //   {"empleado_id": 1, "nombre": "Juan", "apellido": "Perez", "email": "juan.perez@example.com", "posicion": "Desarrollador"},
        //   {"empleado_id": 2, "nombre": "Maria", "apellido": "Gomez", "email": "maria.gomez@example.com", "posicion": "Diseñadora"}
        // ]
        $datos = $empleados->todos(); //TODO: Llamar al método todos del modelo Empleados para obtener todas las filas
        $todos = []; //TODO: Crear un arreglo vacío para almacenar los datos
        while ($row = mysqli_fetch_assoc($datos)) { //TODO: Recorrer todas las filas devueltas y agregarlas al arreglo
            $todos[] = $row;
        }
        echo json_encode($todos); //TODO: Convertir el arreglo a formato JSON para enviarlo como respuesta
        break;

    case 'uno': //TODO: Caso para obtener un empleado por su ID
        // Ejemplo de uso en la URL para obtener un empleado específico:
        // URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/empleados.controller.php?op=uno
        // Método: POST
        // Parámetro: 'empleado_id' (ID del empleado)
        // Ejemplo en Postman:
        // 1. Seleccionar método POST.
        // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/empleados.controller.php?op=uno
        // 3. Body -> x-www-form-urlencoded -> empleado_id=1
        // Descripción: Este endpoint devuelve un empleado específico en formato JSON.
        // Ejemplo de respuesta en JSON:
        // {"empleado_id": 1, "nombre": "Juan", "apellido": "Perez", "email": "juan.perez@example.com", "posicion": "Desarrollador"}
        $empleado_id = $_POST["empleado_id"]; //TODO: Obtener el ID del empleado desde los datos enviados en la solicitud
        $datos = $empleados->uno($empleado_id); //TODO: Llamar al método uno del modelo Empleados para obtener la fila correspondiente
        $res = mysqli_fetch_assoc($datos); //TODO: Convertir el resultado en un arreglo asociativo
        echo json_encode($res); //TODO: Convertir el arreglo a JSON y enviarlo como respuesta
        break;

    case 'insertar': //TODO: Caso para insertar un nuevo empleado
        // Ejemplo de uso en la URL para insertar un nuevo empleado:
        // URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/empleados.controller.php?op=insertar
        // Método: POST
        // Parámetros: 'nombre', 'apellido', 'email', 'posicion'
        // Ejemplo en Postman:
        // 1. Seleccionar método POST.
        // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/empleados.controller.php?op=insertar
        // 3. Body -> x-www-form-urlencoded ->
        //    nombre=Pedro
        //    apellido=Lopez
        //    email=pedro.lopez@example.com
        //    posicion=Analista
        // Descripción: Este endpoint inserta un nuevo empleado en la base de datos.
        // Ejemplo de respuesta en JSON (si la inserción fue exitosa):
        // {"status": "success", "message": "Empleado creado con éxito", "empleado_id": 3}
        
        $nombre = $_POST["nombre"]; //TODO: Obtener el nombre del empleado desde los datos enviados
        $apellido = $_POST["apellido"]; //TODO: Obtener el apellido del empleado desde los datos enviados
        $email = $_POST["email"]; //TODO: Obtener el email del empleado desde los datos enviados
        $posicion = $_POST["posicion"]; //TODO: Obtener la posición del empleado desde los datos enviados

        $datos = $empleados->insertar($nombre, $apellido, $email, $posicion); //TODO: Llamar al método insertar del modelo Empleados para agregar la nueva fila
        echo json_encode($datos); //TODO: Convertir el resultado a JSON y enviarlo como respuesta
        break;

    case 'actualizar': //TODO: Caso para actualizar un empleado existente
        // Ejemplo de uso en la URL para actualizar un empleado existente:
        // URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/empleados.controller.php?op=actualizar
        // Método: POST
        // Parámetros: 'empleado_id', 'nombre', 'apellido', 'email', 'posicion'
        // Ejemplo en Postman:
        // 1. Seleccionar método POST.
        // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/empleados.controller.php?op=actualizar
        // 3. Body -> x-www-form-urlencoded ->
        //    empleado_id=1
        //    nombre=Carlos
        //    apellido=Ramirez
        //    email=carlos.ramirez@example.com
        //    posicion=Gerente
        // Descripción: Este endpoint actualiza los detalles de un empleado existente.
        // Ejemplo de respuesta en JSON (si la actualización fue exitosa):
        // {"status": "success", "message": "Empleado actualizado con éxito"}
        $empleado_id = $_POST["empleado_id"]; //TODO: Obtener el ID del empleado a actualizar
        $nombre = $_POST["nombre"]; //TODO: Obtener el nuevo nombre del empleado desde los datos enviados
        $apellido = $_POST["apellido"]; //TODO: Obtener el nuevo apellido del empleado desde los datos enviados
        $email = $_POST["email"]; //TODO: Obtener el nuevo email del empleado desde los datos enviados
        $posicion = $_POST["posicion"]; //TODO: Obtener la nueva posición del empleado desde los datos enviados

        $datos = $empleados->actualizar($empleado_id, $nombre, $apellido, $email, $posicion); //TODO: Llamar al método actualizar del modelo Empleados para modificar la fila
        echo json_encode($datos); //TODO: Convertir el resultado a JSON y enviarlo como respuesta
        break;

    case 'eliminar': //TODO: Caso para eliminar un empleado
        // Ejemplo de uso en la URL para eliminar un empleado:
        // URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/empleados.controller.php?op=eliminar
        // Método: POST
        // Parámetro: 'empleado_id'
        // Ejemplo en Postman:
        // 1. Seleccionar método POST.
        // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/empleados.controller.php?op=eliminar
        // 3. Body -> x-www-form-urlencoded -> empleado_id=1
        // Descripción: Este endpoint elimina un empleado de la base de datos.
        // Ejemplo de respuesta en JSON (si la eliminación fue exitosa):
        // {"status": "success", "message": "Empleado eliminado con éxito"}
        $empleado_id = $_POST["empleado_id"]; //TODO: Obtener el ID del empleado a eliminar
        $datos = $empleados->eliminar($empleado_id); //TODO: Llamar al método eliminar del modelo Empleados para borrar la fila
        echo json_encode($datos); //TODO: Convertir el resultado a JSON y enviarlo como respuesta
        break;
}
?>
