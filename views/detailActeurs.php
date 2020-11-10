<?php

// On démarre la temporisation de sortie, tant qu'elle est active, les données sont mises en tampon
ob_start();



?>

<?php $data = $detail->fetch() ?>

<h2 class="display-4 detailCategorie">Acteur</h2>

<div class="jumbotron jumbotron-fluid">
    <div class="container">

        <h1 class="display-4 detailTitre"><?= $data['nom_acteur'] ?></h1>

        <!-- Si le sexe est égal à H, alors afficher Homme, sinon si le sexe est égal à F, alors afficher Femme -->
        <p class="lead">Sexe : <?php if ($data['sexe'] == "H") {
                                    echo "Homme";
                                } else if ($data['sexe'] == "F") {
                                    echo "Femme";
                                } ?>
            <br>
            Date de naissance : <?= $data['naissance'] ?>
            <br>
            Filmographie :
            <ul>
                <!-- Afficher la liste des films où l'acteur a joué -->
                <?php while ($data2 = $detail2->fetch()) { ?>
                    <li><a href="index.php?action=detailFilm&id=<?= $data2['id_film'] ?>"><?= $data2['titre'] ?></a>
                    <?php } ?>
                    </li>
            </ul>
        </p>
    </div>
</div>
<td><button type="button" class="btn btn-danger"><a class="btn" href="index.php?action=detailActeurDelete&id=<?= $data['id_acteur'] ?>">Supprimer</a></button></td>
<td><button type="button" class="btn btn-primary"><a class="btn" href="#">Modifier</a></button></td>


<?php

$titre = "Acteur " . $data['nom_acteur'];

// La fonction closeCursor permet de fermer une série de fetch afin d'éxecuter une nouvelle requète.
$detail->closeCursor();

// Récupération et mise en mémoire tampon des données puis suppression
$contenu = ob_get_clean();

require "views/template.php";
