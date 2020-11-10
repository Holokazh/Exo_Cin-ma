<?php

// On démarre la temporisation de sortie, tant qu'elle est active, les données sont mises en tampon
ob_start();

?>

<form action="index.php?action=addReal" method="post">

    <!-- Nom du Réalisateur -->
    <div class="form-group">
        <label for="nom_realisateur">Nom du réalisateur</label>
        <input type="text" class="form-control" placeholder="Nom" id="nom_realisateur" name="nom_realisateur" required>
    </div>

    <!-- Prénom du Réalisateur -->
    <div class="form-group">
        <label for="prenom_realisateur">Prénom du réalisateur</label>
        <input type="text" class="form-control" placeholder="Prénom" id="prenom_realisateur" name="prenom_realisateur" required>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>

</form>

<?php

$titre = "Ajout d'un réalisateur";

// Récupération et mise en mémoire tampon des données puis suppression
$contenu = ob_get_clean();

require "views/template.php";
