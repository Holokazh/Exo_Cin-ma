<?php

// DataAccessObject la class DAO nous permet d'accéder à notre base de donnée via une instance
class DAO
{
    private $bdd;

    public function __construct()
    {
        // Variable $bdd = new PDO(chemin de connexion à la base de donnée)
        $this->bdd = new PDO('mysql:host=localhost;dbname=exercice_cinema_vt_sandbox;charset=utf8', 'root', '');
    }

    // Cette fonction nous permet de récupérer la base de donnée
    function getBDD()
    {
        return $this->bdd;
    }

    // Cette fonction nous permet d'exécuter une requète SQL
    public function executerRequete($sql, $params = NULL)
    {
        if ($params == NULL) {
            $resultat = $this->bdd->query($sql);
        } else {
            // prepare() prépare la requète à l'execution
            $resultat = $this->bdd->prepare($sql);
            // execute() execute la requète préparée en amont
            $resultat->execute($params);
        }
        return $resultat;
    }
    // Qu'est ce qu'une requete préparée en PHP ? 
    //
    // INFORMATION : ( Voir injection SQL )
    // https://www.php.net/manual/fr/pdo.prepare.php
    // https://www.php.net/manual/fr/security.database.sql-injection.php
}
