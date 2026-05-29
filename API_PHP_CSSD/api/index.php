<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
require_once "../configuracion/Database.php";
require_once "../clases/Productos.php";

$database = new Database();
$db = $database->getConnection();
$producto = new Productos($db);

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = '/API_PHP_CSSD/api';
$endpoint = str_replace($basePath, '', $uri);
$endpoint = trim($endpoint, '/');
$segments = explode('/', $endpoint);

if (empty($segments[0]) || $segments[0] !== 'productos') {
    http_response_code(404);
    echo json_encode(["message" => "recurso no encontrado"]);
    exit;
}
//solo endoint de consulta general
if ($method === 'GET' && count($segments) === 1) {
    $stmt = $producto->getProductos();
    $total = $stmt->rowCount();

    if ($total > 0) {
        $productos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productos[] = $row;
        }
        http_response_code(200);
        echo json_encode($productos);
    } else {
        http_response_code(404);
        echo json_encode(["message" => "no se encontraron productos"]);
    }
    exit;
}

//por si intentan usar POST, PUT, DELETE o poner un id
http_response_code(405);
echo json_encode(["message" => "metodo no permitido (solo se admite la consulta general)"]);
?>