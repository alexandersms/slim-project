<?php
namespace App\Utilities;

use Slim\Views\Twig;

class AbstractController
{

    protected $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }
}
