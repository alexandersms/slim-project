<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Utilities\AbstractController;

class AuthController extends AbstractController
{

    function register(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->twig->render($response, 'auth/register.twig');
    }

    function connexion(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->twig->render($response, 'auth/connexion.twig');
    }
}
