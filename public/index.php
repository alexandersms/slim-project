<?php
// Récupération de l'autoloader créé par composer
require '../vendor/autoload.php';
// Les "use" des différentes classes

use Slim\App;
// On crée l'application Slim
$app = new App();

$app->get('/', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->getBody()->write('<h1>Bonjour mon ami</h1>');
});

$app->run();
