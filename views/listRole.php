<?php

// On démarre la temporisation de sortie, tant qu'elle est active, les données sont mises en tampon
ob_start();

$titre = "Liste des rôles";
?>
<table>
    <thead>
        <tr>
            <td>Rôles</td>
            <td>Supprimer</td>
            <td>Modifier</td>
        </tr>
    </thead>
    <?php
    // On affiche la liste des rôles
    while ($data = $role->fetch()) {
    ?>
        <tr>
            <td><a class="nom" href="#"><?= $data['nom_role']; ?></a></td>
            <td><button type="button" class="btn btn-danger"><a class="btn" href="index.php?action=detailRoleDelete&id=<?= $data['id_role'] ?>">Supprimer</a></button></td>
            <td><button type="button" class="btn btn-primary"><a class="btn" href="#">Modifier</a></button></td>
        </tr>
    <?php
    }
    ?>

</table>
<?php
// La fonction closeCursor permet de fermer une série de fetch afin d'éxecuter une nouvelle requète.
$role->closeCursor();

// Récupération et mise en mémoire tampon des données puis suppression
$contenu = ob_get_clean();

require "views/template.php";
