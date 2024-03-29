<?php

use App\Controller\APIController;
use App\Controller\AuthController;
use App\Controller\HomeController;
use App\Controller\UserController;
use App\Controller\ProductController;

// Création d'une route
$app->get('/', HomeController::class . ':home');
$app->get('/contact', HomeController::class . ':contact');

$app->get('/hamac', APIController::class . ':hamac');

$app->group('/produit', function () {
    // Page de la liste des produits
    $this->get('/liste', ProductController::class . ':liste');
    // Création d'une route possédant une variable
    $this->get('/{id:\d+}', ProductController::class . ':show');
    // Page de modification des produits
    // todo : créer route et contrôleurs
    // Page de suppression des produits
    // todo : créer route et contrôleurs
});

//Page d'connexion
$app->map(['GET', 'POST'], '/inscription', AuthController::class . ':register');
$app->get('/connexion', AuthController::class . ':connexion');

//Page utilisateur
$app->get('/utilisateur', UserController::class . ':liste');
