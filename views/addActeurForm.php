<?php

// On démarre la temporisation de sortie, tant qu'elle est active, les données sont mises en tampon
ob_start();

?>

<form action="index.php?action=addActeur" method="post">

    <!-- Nom de l'acteur -->
    <div class="form-group">
        <label for="nom_acteur">Nom de l'acteur</label>
        <input type="text" class="form-control" placeholder="Nom" id="nom_acteur" name="nom_acteur" required>
    </div>

    <!-- Prénom de l'acteur -->
    <div class="form-group">
        <label for="prenom_acteur">Nom de l'acteur</label>
        <input type="text" class="form-control" placeholder="Prénom" id="prenom_acteur" name="prenom_acteur" required>
    </div>

    <!-- sexe -->
    <div class="form-group col-md-4">
        <label for="sexe">Sexe</label>
        <select id="sexe" name="sexe" class="form-control">
            <option value="H" selected>Homme</option>
            <option value="F">Femme</option>
        </select>
    </div>

    <!-- Date de naissance -->
    <div class="form-group">
        <label for="date_naissance">Date de naissance de l'acteur</label>
        <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>

</form>

<?php

$titre = "Ajout d'un acteur";

// Récupération et mise en mémoire tampon des données puis suppression
$contenu = ob_get_clean();

require "views/template.php";
