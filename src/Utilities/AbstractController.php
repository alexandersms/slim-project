<?php
namespace App\Utilities;

use Slim\Views\Twig;

class AbstractController
{

    protected $twig;
    protected $database;

    public function __construct(Twig $twig, Database $database)
    {
        $this->twig = $twig;
        $this->database = $database;
    }
}
