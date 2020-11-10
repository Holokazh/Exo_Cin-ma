<?php

// On démarre la temporisation de sortie, tant qu'elle est active, les données sont mises en tampon
ob_start();

$titre = "Liste des films";
?>
<h2>Nombre de films : <?= $film->rowCount(); ?></h2>
<table>
    <thead>
        <tr>
            <td>Titre</td>
            <td>Année de sortie</td>
            <td>Durée</td>
            <td>Note</td>
            <td>Supprimer</td>
            <td>Modifier</td>
        </tr>
    </thead>
    <?php
    // On affiche la liste des films
    while ($data = $film->fetch()) {
    ?>
        <tr>
            <td><a class="nom" href="index.php?action=detailFilm&id=<?= $data['id_film'] ?>"><?= $data['titre']; ?></a></td>
            <td><?= $data['annee']; ?></td>
            <td><?= $data['duree'] . " minute(s)"; ?></td>
            <td><?php for ($i = 0; $i < $data['note']; $i++) { ?>
                    <span class="fas fa-star"></span>
                <?php } ?>
            </td>
            <td><button type="button" class="btn btn-danger"><a class="btn" href="index.php?action=detailFilmDelete&id=<?= $data['id_film'] ?>">Supprimer</a></button></td>
            <td><button type="button" class="btn btn-primary"><a class="btn" href="#">Modifier</a></button></td>
        </tr>
    <?php
    }
    ?>
</table>
<button type="button" class="btn btn-info"><a class="btn" href="index.php?action=addFilmForm">Ajouter un film</a></button>


<?php
// La fonction closeCursor permet de fermer une série de fetch afin d'éxecuter une nouvelle requète.
$film->closeCursor();

// Récupération et mise en mémoire tampon des données puis suppression
$contenu = ob_get_clean();

require "views/template.php";
