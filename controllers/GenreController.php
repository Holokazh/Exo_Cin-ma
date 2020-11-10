<?php

require_once "bdd/DAO.php";

class GenreController
{

    public function listGenre()
    {
        $dao = new DAO;
        $sql = "SELECT * FROM genre";
        $genre = $dao->executerRequete($sql);
        require_once "views/listGenre.php";
    }

    public function detailGenre($id)
    {
        $dao = new DAO;
        $sql = "SELECT nom_genre
        FROM genre g
        WHERE g.id_genre = :id";

        $detail = $dao->executerRequete($sql, [":id" => $id]);

        $sql2 = "SELECT g.id_genre, f.id_film, titre, nom_genre
        FROM film f, genre g, appartient a
        WHERE f.id_film = a.id_film
        AND g.id_genre = a.id_genre
        AND g.id_genre = :id";

        $detail2 = $dao->executerRequete($sql2, [":id" => $id]);

        require_once "views/detailGenre.php";
    }

    public function deleteGenre($id)
    {
        $dao = new DAO;
        $sql = "DELETE FROM appartient WHERE id_genre = :id";
        $sql2 = "DELETE FROM genre WHERE id_genre = :id";

        $dao->executerRequete($sql, [":id" => $id]);
        $dao->executerRequete($sql2, [":id" => $id]);

        // redirection vers liste des genres
        header("Location: index.php?action=listGenre");
    }

    public function addGenreForm()
    {
        require_once "views/addGenreForm.php";
    }

    public function addGenre($array)
    {
        $dao = new DAO;
        $sql = "INSERT INTO genre (nom_genre) 
        VALUES (:nom)";

        $nom_genre = filter_var($array['nom_genre'], FILTER_SANITIZE_STRING);

        $add = $dao->executerRequete($sql, [":nom" => $nom_genre]);

        header("location: index.php?action=listGenre");
    }
}
