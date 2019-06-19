<?php
namespace App\Utilities;

use PDO;

/**
 * Cette classe utilise PDO afin d'effectuer des opérations sur la BDD
 */
class Database
{
    /**
     * Instance de PDO
     * @var \PDO
     */
    private $pdo;
    /**
     * On crée un constructeur pour initialiser PDO automatiquement
     */
    public function __construct(string $dbName, string $dbUser, string $dbHost, ?string $dbPass = null)
    {
        $this->connect($dbName,  $dbUser,  $dbHost, $dbPass);
    }
    /**
     * Créer une instance de PDO
     */
    public function connect(string $dbName, string $dbUser, string $dbHost, ?string $dbPass = null): void
    {
        // Connexion à MySQL
        $this->pdo = new PDO(
            'mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8mb4',
            $dbUser,
            $dbPass,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
    /**
     * Exécute la requête SQL fournie et retourne un éventuel tableau
     * @param string $sql
     * @param string $className
     * @return array|null
     */
    public function query(string $sql, string $className): ?array
    {
        // Execution de la requête
        $result = $this->pdo->query($sql);
        // Récupération des résultats
        return $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $className);
    }

    /**
     * Undocumented function
     *
     * @param string $sql
     * @param array $params
     * @param string|null $className
     * @return array|null
     */
    public function queryPrepared(string $sql, array $params, ?string $className = null): ?array
    {
        // Preparation de la requete SQL
        $statement = $this->pdo->prepare($sql);
        // Exécution de la requête SQL
        $statement->execute($params);
        // Retour des resultats
        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $className);
    }

    /**
     * Execute une requête SQL pour :
     * - La création (INSERT INTO)
     * - La modification (UPDATE)
     * - La suppression (DELETE, DROP)
     * @param string $sql
     * @return int
     */
    public function exec(string $sql): int
    {
        return $this->pdo->exec($sql);
    }
}
