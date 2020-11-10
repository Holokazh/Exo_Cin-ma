<?php

require_once "bdd/DAO.php";

class ActeurController
{

    public function listActeurs()
    {
        $dao = new DAO;
        $sql = "SELECT id_acteur, CONCAT(prenom_acteur,' ',nom_acteur) AS nom_acteur, DATE_FORMAT(date_naissance, '%e %b %Y') AS naissance FROM acteur";

        $acteur = $dao->executerRequete($sql);

        require_once "views/listActeurs.php";
    }

    public function detailActeurs($id)
    {
        $dao = new DAO;
        // $sql = "SELECT f.id_film, titre, CONCAT(prenom_acteur,' ',nom_acteur) AS nom_acteur, sexe, DATE_FORMAT(date_naissance, '%e %M %Y') AS naissance
        // FROM film f, realisateur r, acteur a, casting c, role ro
        // WHERE f.id_real = r.id_real
        // AND a.id_acteur = c.id_acteur
        // AND f.id_film = c.id_film
        // AND ro.id_role = c.id_role
        // AND a.id_acteur = :id";

        $sql = "SELECT CONCAT(prenom_acteur,' ',nom_acteur) AS nom_acteur, sexe, DATE_FORMAT(date_naissance, '%e %M %Y') AS naissance
        FROM acteur
        WHERE id_acteur = :id";

        $detail = $dao->executerRequete($sql, [":id" => $id]);

        $sql2 = "SELECT f.id_film, titre, CONCAT(prenom_acteur,' ',nom_acteur) AS nom_acteur
        FROM film f, acteur a, casting c
        WHERE f.id_film = c.id_film
        AND a.id_acteur = c.id_acteur
        AND a.id_acteur = :id";

        $detail2 = $dao->executerRequete($sql2, [":id" => $id]);

        require_once "views/detailActeurs.php";
    }

    public function deleteActeur($id)
    {
        $dao = new DAO;
        $sql = "DELETE FROM casting WHERE id_acteur = :id";
        $sql2 = "DELETE FROM acteur WHERE id_acteur = :id";

        $dao->executerRequete($sql, [":id" => $id]);
        $dao->executerRequete($sql2, [":id" => $id]);

        // redirection vers liste des acteurs
        header("Location: index.php?action=listActeurs");
    }

    public function addActeurForm()
    {
        require_once "views/addActeurForm.php";
    }

    public function addActeur($array)
    {
        $dao = new DAO;
        $sql = "INSERT INTO acteur (nom_acteur, prenom_acteur, sexe, date_naissance)
        VALUES (:nom, :prenom, :sexe, :naissance)";

        $nom = filter_var($array['nom_acteur'], FILTER_SANITIZE_STRING);
        $prenom = filter_var($array['prenom_acteur'], FILTER_SANITIZE_STRING);
        $sexe = $array['sexe'];
        $naissance = $array['date_naissance'];

        $add = $dao->executerRequete($sql, [":nom" => $nom, ":prenom" => $prenom, ":sexe" => $sexe, ":naissance" => $naissance]);

        header("location: index.php?action=listActeurs");
    }
}
