<?php

// On démarre la temporisation de sortie, tant qu'elle est active, les données sont mises en tampon
ob_start();

$titre = "Liste des réalisateurs";
?>
<table>
    <thead>
        <tr>
            <td>Nom</td>
            <td>Supprimer</td>
            <td>Modifier</td>
        </tr>
    </thead>
    <?php
    // On affiche la liste des réalisateurs
    while ($data = $real->fetch()) {
    ?>
        <tr>
            <td><a class="nom" href="index.php?action=detailReal&id=<?= $data['id_real'] ?>"><?= $data['prenom_realisateur'] . " " . $data['nom_realisateur']; ?></a></td>
            <td><button type="button" class="btn btn-danger"><a class="btn" href="index.php?action=detailRealDelete&id=<?= $data['id_real'] ?>">Supprimer</a></button></td>
            <td><button type="button" class="btn btn-primary"><a class="btn" href="#">Modifier</a></button></td>
        </tr>
    <?php
    }

    ?>


</table>
<button type="button" class="btn btn-info"><a class="btn" href="index.php?action=addRealForm">Ajouter un réalisateur</a></button>
<?php
// La fonction closeCursor permet de fermer une série de fetch afin d'éxecuter une nouvelle requète.
$real->closeCursor();

// Récupération et mise en mémoire tampon des données puis suppression
$contenu = ob_get_clean();

require "views/template.php";
