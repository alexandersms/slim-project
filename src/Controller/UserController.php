<?php
namespace App\Controller;

use App\Entity\User;
use Slim\Views\Twig;
use App\Repository\UserRepository;
use App\Utilities\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class UserController extends AbstractController
{
     /**
     * @var UserRepository
     */
    private $userRepository;
    public function __construct(Twig $twig, UserRepository $userRepository)
    {
        parent::__construct($twig);
        $this->userRepository = $userRepository;
    }
    /**
     * Page de la liste des utilisateur
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return ResponseInterface
     */
    public function liste(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $users = $this->userRepository->findAll();
        // On renvoie les produits à la vue
        return $this->twig->render($response, 'users/list.twig', [
            'users' => $users
        ]);
    }
    /**
     * Affichage du détail de l'utilisateur
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return ResponseInterface
     */
    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $id = $args['id'];
        // Requête SQL
        $query = "SELECT * FROM app_user WHERE id = ?";
        $user = $this->database->queryPrepared($query, [$id], User::class);
        // On teste si un produit a été retourné
        if (empty($user)) {
            // Page d'erreur 404
            return $this->twig
                ->render($response, 'errors/error404.twig')
                ->withStatus(404);
        }
        return $this->twig->render($response, 'users/list.twig');
    }
}
