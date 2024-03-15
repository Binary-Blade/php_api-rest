<?php

header("Content-Type: application/json");

$requestMethod = $_SERVER["REQUEST_METHOD"];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriSegments = explode('/', $uri);

// Vérification du préfixe de l'URI pour s'assurer qu'il s'agit de l'API v1
if ($uriSegments[1] !== 'api' || $uriSegments[2] !== 'v1') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

// Retirer les deux premiers segments ('api' et 'v1')
$endpoint = array_slice($uriSegments, 3);

// Exemple de routage basé sur les segments restants
switch ($endpoint[0]) {
    case '':
        echo json_encode(["message" => "Bienvenue sur notre API v1"]);
        break;
    case 'about':
        echo json_encode(["message" => "Voici la page À propos de notre API"]);
        break;
    default:
        http_response_code(404);
        echo json_encode(["message" => "404, page non trouvée!"]);
        break;
}
