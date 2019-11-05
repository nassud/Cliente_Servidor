<?php 
require_once('utilidades/Basedatos.php');
require_once('controladores/PersonasControlador.php');

// Definimos los encabezados de la respuesta HTTP
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8"); // Vamos a responder en formato JSON
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE"); // Solo admitimos los verbos HTTP listados
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

//print_r($uri);

// Si la URL solicitada no inicia con el segmento `personas` entonces devolvemos una respuesta de NO ENCONTRADO
if ($uri[2] !== 'personas') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

// Extraemos el identificador de registro si existe
$identificadorRegistro = null;
if (isset($uri[3])) {
    $identificadorRegistro = (int) $uri[3];
}

$metodoSolicitud = $_SERVER["REQUEST_METHOD"]; // Este es el verbo/método de la solicitud. Ej. OPTIONS, GET, POST, PUT, DELETE...

// pass the request method and user ID to the PersonController and process the HTTP request:
$bd = new Basedatos();
$conexion = $bd->getConexion();
$controller = new PersonasControlador($conexion, $metodoSolicitud, $identificadorRegistro);
$controller->procesarSolicitud();