<?php

require_once "bdd/DAO.php";

class RealisateurController
{

    public function listReal()
    {
        $dao = new DAO;
        $sql = "SELECT * FROM realisateur";
        $real = $dao->executerRequete($sql);
        require_once "views/listReal.php";
    }

    public function detailReal($id)
    {
        $dao = new DAO;
        $sql = "SELECT CONCAT(prenom_realisateur,' ',nom_realisateur) AS nom_realisateur
        FROM realisateur r
        WHERE r.id_real = :id";

        $detail = $dao->executerRequete($sql, [":id" => $id]);

        $sql2 = "SELECT f.id_film, titre, CONCAT(prenom_realisateur,' ',nom_realisateur) AS nom_realisateur
        FROM film f, realisateur r
        WHERE f.id_real = r.id_real
        AND r.id_real = :id";

        $detail2 = $dao->executerRequete($sql2, [":id" => $id]);

        require_once "views/detailReal.php";
    }

    public function deleteReal($id)
    {
        $dao = new DAO;
        $sql = "UPDATE film SET id_real = NULL WHERE id_real = :id";
        $sql2 = "DELETE FROM realisateur WHERE id_real = :id";

        $dao->executerRequete($sql, [":id" => $id]);
        $dao->executerRequete($sql2, [":id" => $id]);

        // redirection vers liste des réalisateurs
        header("Location: index.php?action=listReal");
    }

    public function addRealForm()
    {
        require_once "views/addRealForm.php";
    }

    public function addReal($array)
    {
        $dao = new DAO;
        $sql = "INSERT INTO realisateur (nom_realisateur, prenom_realisateur) 
        VALUES (:nom, :prenom)";

        $nom_realisateur = filter_var($array['nom_realisateur'], FILTER_SANITIZE_STRING);
        $prenom_realisateur = filter_var($array['prenom_realisateur'], FILTER_SANITIZE_STRING);

        $add = $dao->executerRequete($sql, [":nom" => $nom_realisateur, ":prenom" => $prenom_realisateur]);

        header("location: index.php?action=listReal");
    }
}
