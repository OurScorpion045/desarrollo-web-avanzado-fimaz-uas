<?php
require_once __DIR__ . '/../controllers/futbolistas.controller.php';

header("Content-Type: application/json");

$controller = new futbolistasController();

$request = $_SERVER['REQUEST_METHOD'];
$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

$resourceIndex = array_search('futbolistas', $uri);

if ($resourceIndex === false) {
    http_response_code(404);
    echo json_encode(["error" => "Ruta no encontrada"]);
    exit;
}

$resource = $uri[$resourceIndex];
$id = $uri[$resourceIndex + 1] ?? null;

if ($resource === 'futbolistas') {

    switch ($request) {

        case 'GET':
            if ($id) {
                $controller->obtenerPorId($id);
            } else {
                $controller->listar();
            }
            break;
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);

            $controller->insertar(
                $data['nombre'],
                $data['posicion'],
                $data['numero'],
                $data['edad'],
                $data['equipo']
            );
            break;
        
            case 'PUT':
                if (!$id) {
                    http_response_code(400);
                    echo json_encode(["error" => "ID requerido"]);
                    exit;
                }

                $data = json_decode(file_get_contents("php://input"), true);

                $controller->actualizar(
                    $id,
                    $data['nombre'],
                    $data['posicion'],
                    $data['numero'],
                    $data['edad'],
                    $data['equipo']
                );
                break;
            
            case 'DELETE':
                if (!$id) {
                    http_response_code(400);
                    echo json_encode(["error" => "ID requerido"]);
                    exit;
                }

                $controller->eliminar($id);
                break;
            
            default:
                http_response_code(405);
                echo json_encode(["error" => "Metodo no permitido"]);
                break;
    }
} else {
    http_response_code(404);
    echo json_encode(["error" => "Ruta no encontrada"]);
}

?>