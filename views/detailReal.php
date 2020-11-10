<?php

// On démarre la temporisation de sortie, tant qu'elle est active, les données sont mises en tampon
ob_start();



?>

<?php $data = $detail->fetch() ?>

<h2 class="display-4 detailCategorie">Réalisateur</h2>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 detailTitre"><?= $data['nom_realisateur'] ?></h1>
        <p class="lead"> Filmographie :
            <ul>
                <!-- On affiche les films du réalisateur -->
                <?php while ($data2 = $detail2->fetch()) { ?>
                    <li><a href="index.php?action=detailFilm&id=<?= $data2['id_film'] ?>"><?= $data2['titre'] ?></a>
                    <?php } ?>
                    </li>
            </ul>
        </p>
    </div>
</div>
<td><button type="button" class="btn btn-danger"><a class="btn" href="index.php?action=detailRealDelete&id=<?= $data['id_real'] ?>">Supprimer</a></button></td>
<td><button type="button" class="btn btn-primary"><a class="btn" href="#">Modifier</a></button></td>


<?php

$titre = "Réalisateur " . $data['nom_realisateur'];

// La fonction closeCursor permet de fermer une série de fetch afin d'éxecuter une nouvelle requète.
$detail->closeCursor();

// Récupération et mise en mémoire tampon des données puis suppression
$contenu = ob_get_clean();

require "views/template.php";
