<?php

// On démarre la temporisation de sortie, tant qu'elle est active, les données sont mises en tampon
ob_start();

$titre = "Liste des genres";
?>
<table>
    <thead>
        <tr>
            <td>Genre</td>
            <td>Supprimer</td>
            <td>Modifier</td>
        </tr>
    </thead>
    <?php
    // On affiche la liste des genres
    while ($data = $genre->fetch()) {
    ?>
        <tr>
            <td><a class="nom" href="index.php?action=detailGenre&id=<?= $data['id_genre'] ?>"><?= $data['nom_genre']; ?></a></td>
            <td><button type="button" class="btn btn-danger"><a class="btn" href="index.php?action=detailGenreDelete&id=<?= $data['id_genre'] ?>">Supprimer</a></button></td>
            <td><button type="button" class="btn btn-primary"><a class="btn" href="#">Modifier</a></button></td>
        </tr>
    <?php
    }
    ?>

</table>
<button type="button" class="btn btn-info"><a class="btn" href="index.php?action=addGenreForm">Ajouter un genre</a></button>
<?php
// La fonction closeCursor permet de fermer une série de fetch afin d'éxecuter une nouvelle requète.
$genre->closeCursor();

// Récupération et mise en mémoire tampon des données puis suppression
$contenu = ob_get_clean();

require "views/template.php";
