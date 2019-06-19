<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Utilities\AbstractController;
use App\Utilities\Database;
use App\Entity\Produit;

class ProductController extends AbstractController
{

    public function liste(ServerRequestInterface $request, ResponseInterface $response)
    {
        // Connexion à la BDD
        //$database = new Database();
        // Requête SQL
        $query = "SELECT * FROM produit WHERE etat_publication = 1";
        // Exécution de la requête SQL et récupération des produits
        $products = $this->database->query($query, Produit::class);
        // On renvoie les produits à la vue
        return $this->twig->render($response, 'product/listprod.twig', [
            'products' => $products
        ]);
    }
    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        // var_dump($args['id']);
        $id = $args['id'];
        // Requete SQL
        $query = "SELECT * FROM produit WHERE id = ? AND etat_publication = 1";
        $product = $this->database->queryPrepared($query, [$id], Produit::class);
        // On test si produit a été retourné
        if (empty($product)) {
            //Page erreur 404
            return $this->twig
                ->render($response, 'errors/error404.twig')
                ->withStatus(404);
        }
        //var_dump($product);
        return $this->twig->render($response, 'product/detailprod.twig', [
            'product' => $product
        ]);
    }
}
