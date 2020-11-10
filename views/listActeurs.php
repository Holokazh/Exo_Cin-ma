<?php

// On démarre la temporisation de sortie, tant qu'elle est active, les données sont mises en tampon
ob_start();

$titre = "Liste des acteurs";
?>
<table>
    <thead>
        <tr>
            <td>Nom</td>
            <td>Date de naissance</td>
            <td>Supprimer</td>
            <td>Modifier</td>
        </tr>
    </thead>
    <?php
    // On affiche la liste des acteurs
    while ($data = $acteur->fetch()) {
    ?>
        <tr>
            <td><a class="nom" href="index.php?action=detailActeurs&id=<?= $data['id_acteur'] ?>"><?= $data['nom_acteur']; ?></a></td>
            <td><?= $data['naissance']; ?></td>
            <td><button type="button" class="btn btn-danger"><a class="btn" href="index.php?action=detailActeurDelete&id=<?= $data['id_acteur'] ?>">Supprimer</a></button></td>
            <td><button type="button" class="btn btn-primary"><a class="btn" href="#">Modifier</a></button></td>
        </tr>
    <?php

    }

    ?>

</table>
<button type="button" class="btn btn-info"><a class="btn" href="index.php?action=addActeurForm">Ajouter un acteur</a></button>
<?php
// La fonction closeCursor permet de fermer une série de fetch afin d'éxecuter une nouvelle requète.
$acteur->closeCursor();

// Récupération et mise en mémoire tampon des données puis suppression
$contenu = ob_get_clean();

require "views/template.php";
