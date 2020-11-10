<?php

// Require des controllers
require_once "controllers/FilmController.php";
require_once "controllers/ActeurController.php";
require_once "controllers/RealisateurController.php";
require_once "controllers/RoleController.php";
require_once "controllers/GenreController.php";
require_once "controllers/AccueilController.php";

// Instanciation des objets de class
$ctrlFilm = new FilmController();
$ctrlActeur = new ActeurController();
$ctrlRealisateur = new RealisateurController();
$ctrlRole = new RoleController();
$ctrlGenre = new GenreController();
$ctrlAccueil = new AccueilController();


// Récuperation de l'action dans l'URL
if (isset($_GET['action'])) {

    // filter pour sécuriser la saisie
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING); // car possible d'injecter dans l'URL
    $rolePrecis = filter_input(INPUT_GET, "roleId", FILTER_SANITIZE_STRING);
    $idActeur = filter_input(INPUT_GET, "idActeur", FILTER_SANITIZE_STRING);

    switch ($_GET['action']) {

            // ACCUEIL
        case "pageAccueil":
            $ctrlAccueil->pageAccueil();
            break;


            // ACTEURS
        case "listActeurs":
            $ctrlActeur->listActeurs();
            break;
        case "detailActeurs":
            $ctrlActeur->detailActeurs($id);
            break;
        case "detailActeurDelete":
            $ctrlActeur->deleteActeur($id);
            break;
        case "addActeurForm":
            $ctrlActeur->addActeurForm($id);
            break;
        case "addActeur":
            $ctrlActeur->addActeur($_POST);
            break;

            // FILMS
        case "listFilm":
            $ctrlFilm->listFilm();
            break;
        case "detailFilm":
            $ctrlFilm->detailFilm($id);
            break;
        case "detailFilmDelete":
            $ctrlFilm->deleteFilm($id);
            break;
        case "addFilmForm":
            $ctrlFilm->addFilmForm();
            break;
        case "addFilm":
            $ctrlFilm->addFilm($_POST);
            break;

            // GENRE
        case "listGenre":
            $ctrlGenre->listGenre();
            break;
        case "detailGenre":
            $ctrlGenre->detailGenre($id);
            break;
        case "detailGenreDelete":
            $ctrlGenre->deleteGenre($id);
            break;
        case "addGenreForm":
            $ctrlGenre->addGenreForm();
            break;
        case "addGenre":
            $ctrlGenre->addGenre($_POST);
            break;


            // REALISATEURS
        case "listReal":
            $ctrlRealisateur->listReal();
            break;
        case "detailReal":
            $ctrlRealisateur->detailReal($id);
            break;
        case "detailRealDelete":
            $ctrlRealisateur->deleteReal($id);
            break;
        case "addRealForm":
            $ctrlRealisateur->addRealForm();
            break;
        case "addReal":
            $ctrlRealisateur->addReal($_POST);
            break;


            // ROLES
        case "listRole":
            $ctrlRole->listRole();
            break;
    }
} else {
    $ctrlAccueil->pageAccueil();
}
