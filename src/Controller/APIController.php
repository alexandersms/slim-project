<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class APIController
{
    public function hamac(ServerRequestInterface $request, ResponseInterface $response)
    {
        // Création des données
        $hamac = [
            "name" => "Hamac",
            "description" => "Pour dormir APRES Slim (pas pendant... ;))"
        ];
        // On met les données dans la réponse (en précisant que ce doit être du JSON)
        $response = $response->withJson($hamac);
        // On retourne la réponse au navigateur
        return $response;
    }
}
