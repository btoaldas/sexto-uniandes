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

require_once('../models/proyectos.model.php'); //TODO: Incluir el archivo que contiene la clase Proyectos
$proyectos = new Proyectos(); //TODO: Crear una instancia de la clase Proyectos para poder usar sus métodos

switch ($_GET["op"]) { //TODO: Dependiendo de la operación solicitada, ejecutamos el caso correspondiente
    case 'todos': //TODO: Caso para obtener todos los proyectos
        // Ejemplo de uso en la URL para obtener todos los proyectos:
        // URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/proyectos.controller.php?op=todos
        // Método: GET
        // Descripción: Este endpoint devuelve todos los proyectos en formato JSON.
        $datos = $proyectos->todos(); //TODO: Llamar al método todos del modelo Proyectos para obtener todas las filas
        $todos = []; //TODO: Crear un arreglo vacío para almacenar los datos
        while ($row = mysqli_fetch_assoc($datos)) { //TODO: Recorrer todas las filas devueltas y agregarlas al arreglo
            $todos[] = $row;
        }
        echo json_encode($todos); //TODO: Convertir el arreglo a formato JSON para enviarlo como respuesta
        break;

        case 'uno': // Procedimiento para obtener un proyecto por su ID
            // Verificar si el parámetro 'proyecto_id' está presente en GET o POST
            if (isset($_GET['proyecto_id'])) {
                $proyecto_id = $_GET['proyecto_id']; // Obtener el ID del proyecto desde la URL
            } elseif (isset($_POST['proyecto_id'])) {
                $proyecto_id = $_POST['proyecto_id']; // Obtener el ID del proyecto desde los datos enviados en POST
            } else {
                // Mostrar un mensaje de error si el parámetro no está definido
                echo json_encode(['error' => 'El parámetro proyecto_id no está definido.']);
                exit;
            }
    
            // Verificar que $proyecto_id no esté vacío antes de continuar
            if (!empty($proyecto_id)) {
                $datos = $proyectos->uno($proyecto_id); // Llamar al método uno del modelo Proyectos
                $res = mysqli_fetch_assoc($datos); // Obtener la fila asociada al resultado
                echo json_encode($res); // Convertir el resultado a JSON y enviarlo como respuesta
            } else {
                echo json_encode(['error' => 'El valor de proyecto_id está vacío.']);
            }
            break;
            
    case 'insertar': //TODO: Caso para insertar un nuevo proyecto
        // Ejemplo de uso en la URL para insertar un nuevo proyecto:
        // URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/proyectos.controller.php?op=insertar
        // Método: POST
        // Parámetros: 'nombre', 'descripcion', 'fecha_inicio', 'fecha_fin'
        // Ejemplo en Postman:
        // 1. Seleccionar método POST.
        // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/proyectos.controller.php?op=insertar
        // 3. Body -> x-www-form-urlencoded ->
        //    nombre=Proyecto Gamma
        //    descripcion=Descripción del Proyecto Gamma
        //    fecha_inicio=2024-07-01
        //    fecha_fin=2024-12-31
        // Descripción: Este endpoint inserta un nuevo proyecto en la base de datos.
        // Ejemplo de respuesta en JSON (si la inserción fue exitosa):
        // {"status": "success", "message": "Proyecto creado con éxito", "proyecto_id": 3}
        $nombre = $_POST["nombre"]; //TODO: Obtener el nombre del proyecto desde los datos enviados
        $descripcion = $_POST["descripcion"]; //TODO: Obtener la descripción del proyecto desde los datos enviados
        $fecha_inicio = $_POST["fecha_inicio"]; //TODO: Obtener la fecha de inicio del proyecto desde los datos enviados
        $fecha_fin = $_POST["fecha_fin"]; //TODO: Obtener la fecha de fin del proyecto desde los datos enviados

        $datos = $proyectos->insertar($nombre, $descripcion, $fecha_inicio, $fecha_fin); //TODO: Llamar al método insertar del modelo Proyectos para agregar la nueva fila
        echo json_encode($datos); //TODO: Convertir el resultado a JSON y enviarlo como respuesta
        break;

    case 'actualizar': //TODO: Caso para actualizar un proyecto existente
        // Ejemplo de uso en la URL para actualizar un proyecto existente:
        // URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/proyectos.controller.php?op=actualizar
        // Método: POST
        // Parámetros: 'proyecto_id', 'nombre', 'descripcion', 'fecha_inicio', 'fecha_fin'
        // Ejemplo en Postman:
        // 1. Seleccionar método POST.
        // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/proyectos.controller.php?op=actualizar
        // 3. Body -> x-www-form-urlencoded ->
        //    proyecto_id=1
        //    nombre=Proyecto Alpha Actualizado
        //    descripcion=Descripción actualizada del Proyecto Alpha
        //    fecha_inicio=2024-01-01
        //    fecha_fin=2024-12-31
        // Descripción: Este endpoint actualiza los detalles de un proyecto existente.
        // Ejemplo de respuesta en JSON (si la actualización fue exitosa):
        // {"status": "success", "message": "Proyecto actualizado con éxito"}
        $proyecto_id = $_POST["proyecto_id"]; //TODO: Obtener el ID del proyecto a actualizar
        $nombre = $_POST["nombre"]; //TODO: Obtener el nuevo nombre del proyecto desde los datos enviados
        $descripcion = $_POST["descripcion"]; //TODO: Obtener la nueva descripción del proyecto desde los datos enviados
        $fecha_inicio = $_POST["fecha_inicio"]; //TODO: Obtener la nueva fecha de inicio del proyecto desde los datos enviados
        $fecha_fin = $_POST["fecha_fin"]; //TODO: Obtener la nueva fecha de fin del proyecto desde los datos enviados

        $datos = $proyectos->actualizar($proyecto_id, $nombre, $descripcion, $fecha_inicio, $fecha_fin); //TODO: Llamar al método actualizar del modelo Proyectos para modificar la fila
        echo json_encode($datos); //TODO: Convertir el resultado a JSON y enviarlo como respuesta
        break;

    case 'eliminar': //TODO: Caso para eliminar un proyecto
        // Ejemplo de uso en la URL para eliminar un proyecto:
        // URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/proyectos.controller.php?op=eliminar
        // Método: POST
        // Parámetro: 'proyecto_id'
        // Ejemplo en Postman:
        // 1. Seleccionar método POST.
        // 2. URL: http://localhost/sexto-uniandes/aplicaciones-web/evaluacion-parcial-1/controllers/proyectos.controller.php?op=eliminar
        // 3. Body -> x-www-form-urlencoded -> proyecto_id=1
        // Descripción: Este endpoint elimina un proyecto de la base de datos.
        // Ejemplo de respuesta en JSON (si la eliminación fue exitosa):
        // {"status": "success", "message": "Proyecto eliminado con éxito"}
        $proyecto_id = $_POST["proyecto_id"]; //TODO: Obtener el ID del proyecto a eliminar
        $datos = $proyectos->eliminar($proyecto_id); //TODO: Llamar al método eliminar del modelo Proyectos para borrar la fila
        echo json_encode($datos); //TODO: Convertir el resultado a JSON y enviarlo como respuesta
        break;
}
?>
