<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Utilities\AbstractController;

class HomeController extends AbstractController
{

    function home(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->twig->render($response, 'index.twig');
    }

    function contact(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->twig->render($response, 'contact.twig');
    }
}
