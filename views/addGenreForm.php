<?php

// On démarre la temporisation de sortie, tant qu'elle est active, les données sont mises en tampon
ob_start();

?>

<form action="index.php?action=addGenre" method="post">

    <!-- Genre -->
    <div class="form-group">
        <label for="nom_genre">Nom du genre</label>
        <input type="text" class="form-control" placeholder="Nom" id="nom_genre" name="nom_genre" required>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>

</form>

<?php

$titre = "Ajout d'un genre";

// Récupération et mise en mémoire tampon des données puis suppression
$contenu = ob_get_clean();

require "views/template.php";
