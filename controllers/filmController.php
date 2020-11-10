<?php

require_once "bdd/DAO.php";

class filmController
{

    public function listFilm()
    {
        $dao = new DAO;
        $sql = "SELECT * FROM film ORDER BY annee DESC";
        $film = $dao->executerRequete($sql);
        require_once "views/listFilm.php";
    }

    public function detailFilm($id)
    {
        $dao = new DAO;
        $sql = "SELECT f.id_film, r.id_real, titre, annee, TIME_FORMAT(SEC_TO_TIME(duree*60),'%Hh%imin') AS dureeHeure, note, affiche, synopsis, CONCAT(prenom_realisateur,' ',nom_realisateur) AS nom_real
        FROM film f, realisateur r
        WHERE f.id_real = r.id_real
        AND f.id_film = :id";

        $detail = $dao->executerRequete($sql, [":id" => $id]);

        $sql2 = "SELECT a.id_acteur, CONCAT(prenom_acteur,' ',nom_acteur) AS nom_acteur, nom_role
        FROM film f, acteur a, role r, casting c
        WHERE f.id_film = c.id_film
        AND a.id_acteur = c.id_acteur
        AND r.id_role = c.id_role
        AND f.id_film = :id";

        $detail2 = $dao->executerRequete($sql2, [":id" => $id]);

        $sql3 = "SELECT g.id_genre, nom_genre
        FROM film f, genre g, appartient ap
        WHERE g.id_genre = ap.id_genre
        AND f.id_film = ap.id_film
        AND f.id_film = :id";

        $detail3 = $dao->executerRequete($sql3, [":id" => $id]);

        require_once "views/detailFilm.php";
    }

    public function deleteFilm($id)
    {
        $dao = new DAO;
        $sql = "DELETE FROM appartient WHERE id_film = :id";
        $sql2 = "DELETE FROM casting WHERE id_film = :id";
        $sql3 = "DELETE FROM film WHERE id_film = :id";

        $dao->executerRequete($sql, [":id" => $id]);
        $dao->executerRequete($sql2, [":id" => $id]);
        $dao->executerRequete($sql3, [":id" => $id]);

        // redirection vers liste des films
        header("Location: index.php?action=listFilm");
    }

    public function addFilmForm()
    {
        $dao = new DAO;
        $sql = "SELECT id_real, CONCAT(prenom_realisateur, ' ', nom_realisateur) AS nom_real
        FROM realisateur";

        $sql2 = "SELECT id_genre, nom_genre
        FROM genre";


        $listReal = $dao->executerRequete($sql);
        $listGenre = $dao->executerRequete($sql2);


        require_once "views/addFilmForm.php";
    }

    public function addFilm($array)
    {

        // var_dump($array);
        $dao = new DAO;
        $sql = "INSERT INTO `film` (titre, annee, duree, synopsis, note, affiche, id_real)
        VALUES (:titre, :annee, :duree, :synopsis, :note, :affiche, :id_real)";

        $titre = filter_var($array['titre'], FILTER_SANITIZE_STRING);
        $annee = filter_var($array['annee'], FILTER_SANITIZE_NUMBER_INT);
        $duree = filter_var($array['duree'], FILTER_SANITIZE_NUMBER_INT);
        $synopsis = filter_var($array['synopsis'], FILTER_SANITIZE_STRING);
        $note = filter_var($array['note'], FILTER_SANITIZE_NUMBER_INT);
        $affiche = filter_var($array['affiche'], FILTER_SANITIZE_STRING);
        $id_real = $array['id_real'];

        $add = $dao->executerRequete($sql, [":titre" => $titre, ":annee" => $annee, ":duree" => $duree, ":synopsis" => $synopsis, ":note" => $note, ":affiche" => $affiche, ":id_real" => $id_real]);
        $dernierID = $dao->getBDD()->lastInsertId();

        $sql2 = "INSERT INTO appartient(id_genre, id_film)
        VALUES (:id_genre, :id_film)";

        $genreToFilm = filter_var_array($array['nom_genre'], FILTER_SANITIZE_STRING);
        foreach ($genreToFilm as $genreActuel) {
            $addGenreToFilm = $dao->executerRequete($sql2, [":id_genre" => $genreActuel, ":id_film" => $dernierID]);
        }

        header("location: index.php?action=listFilm");
    }
}
