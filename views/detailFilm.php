<?php

// On démarre la temporisation de sortie, tant qu'elle est active, les données sont mises en tampon
ob_start();

$titre = "Détail du film";
?>



<?php
$data = $detail->fetch()
?>

<section>
    <div class="col-sm-12">
        <h2 class="display-5 detailTitreInfoFilm">INFORMATIONS FILM</h2>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">

                    <!-- Affiche l'image du film -->
                    <img class="imgDetail" src="<?= $data['affiche'] ?>" alt="Affiche du film <?= $data['titre'] ?>">

                </div>
                <div class="col-sm-8 detailDivRight flex">
                    <p id="pDetailFilm">
                        Titre : <?= $data['titre']; ?>
                        <br>
                        Année de sortie : <?= $data['annee']; ?>
                        <br>
                        Durée : <?= $data['dureeHeure']; ?>
                        <br>
                        <!-- Afficher les genres du film -->
                        Genre : <?php while ($data3 = $detail3->fetch()) { ?><a href="index.php?action=detailGenre&id=<?= $data3['id_genre'] ?>"><?= $data3['nom_genre'] . " ";
                                                                                                                                                } ?></a>
                            <br>
                            <!-- Si l'id_real est différent de NULL, on l'affiche, sinon on affiche rien du tout -->
                            <?php if ($data['id_real'] != NULL) { ?>
                                Réalisé par <a href="index.php?action=detailReal&id=<?= $data['id_real'] ?>"><?= $data['nom_real']; ?></a> <?php } ?>
                            <br>
                            Acteur(s) :
                            <ul>
                                <!-- On affiche le nom des acteurs ayant joué dans le film, ainsi que leur rôle dans le film -->
                                <?php while ($data2 = $detail2->fetch()) { ?>
                                    <li><a href="index.php?action=detailActeurs&id=<?= $data2['id_acteur'] ?>"><?= $data2['nom_acteur'] ?> </a>, dans le rôle de <?= $data2['nom_role'];
                                                                                                                                                                } ?>
                                    </li>
                            </ul>
                    </p>
                    <div class="col-sm-12 divDetailTitre">
                        <h2 class="detailTitreInfoFilm">SYNOPSIS</h2>
                        <div class="col-sm-12">
                            <p><?= $data['synopsis'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-danger"><a class="btn" href="index.php?action=detailFilmDelete&id=<?= $data['id_film'] ?>">Supprimer</a></button>
    <button type="button" class="btn btn-primary"><a class="btn" href="#">Modifier</a></button>
</section>
<?php
// La fonction closeCursor permet de fermer une série de fetch afin d'éxecuter une nouvelle requète.
$detail->closeCursor();

// Récupération et mise en mémoire tampon des données puis suppression
$contenu = ob_get_clean();

require "views/template.php";
