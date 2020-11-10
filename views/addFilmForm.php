<?php

// On démarre la temporisation de sortie, tant qu'elle est active, les données sont mises en tampon
ob_start();

?>

<form action="index.php?action=addFilm" method="post">

    <!-- Titre -->
    <div class="form-group">
        <label for="titre">Titre du film</label>
        <input type="text" class="form-control" placeholder="Titre" id="titre" name="titre" required>
    </div>

    <!-- Année -->
    <div class="form-group">
        <label for="annee">Année de sortie</label>
        <input type="number" class="form-control" placeholder="annee" id="annee" name="annee" required>
    </div>

    <!-- Durée -->
    <div class="form-group">
        <label for="duree">Durée en minutes</label>
        <input type="number" class="form-control" id="duree" name="duree" required>
    </div>

    <!-- Synopsis -->
    <div class="form-group">
        <label for="synopsis">Synopsis</label>
        <input type="text" class="form-control" placeholder="synopsis" id="synopsis" name="synopsis" required>
    </div>

    <!-- note -->
    <div class="form-group">
        <label for="note">Note sur 5</label>
        <input type="number" min="0" max="5" class="form-control" placeholder="note" id="note" name="note" required>
    </div>

    <!-- Affiche -->
    <div class="form-group">
        <label for="affiche">Affiche (URL de l'image)</label>
        <input type="text" class="form-control" placeholder="affiche" id="affiche" name="affiche" required>
    </div>


    <!-- Réalisateur -->
    <div class="form-group col-md-7">
        <label for="id_real">Réalisateur</label>
        <select id="id_real" name="id_real" class="form-control" required>
            <?php while ($real = $listReal->fetch()) { ?>
                <option value="<?= $real['id_real'] ?>"><?= $real['nom_real'] ?></option>
            <?php } ?>
        </select>
        <p>Vous ne trouvez pas le Réalisateur ? <a href="index.php?action=addRealForm">Créez le !</a></p>
    </div>

    <!-- Genre -->
    <div class="form-group col-md-7">
        <label for="nom_genre">Genre : (Optionnel)</label>
        <select id="nom_genre" name="nom_genre[]" class="form-control" multiple>
            <?php while ($genre = $listGenre->fetch()) { ?>
                <option value="<?= $genre['id_genre'] ?>"><?php echo $genre['nom_genre'] ?></option>
            <?php } ?>
        </select>
        <p>Vous ne trouvez pas le genre ? <a href="index.php?action=addGenreForm">Créez le !</a></p>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>

</form>

<?php

$titre = "Ajout d'un film";

// Récupération et mise en mémoire tampon des données puis suppression
$contenu = ob_get_clean();

require "views/template.php";
