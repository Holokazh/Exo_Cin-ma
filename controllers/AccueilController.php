<?php

require_once "bdd/DAO.php";

class AccueilController
{

    public function pageAccueil()
    {
        $dao = new DAO;
        $sql = "SELECT * FROM film";
        $film = $dao->executerRequete($sql);
        require_once "views/accueil.php";
    }
}
