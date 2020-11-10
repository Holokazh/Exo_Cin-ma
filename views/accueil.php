<?php

// On démarre la temporisation de sortie, tant qu'elle est active, les données sont mises en tampon
ob_start();

?>

<h2 class="display-4" id="bvnTitre">Bienvenue sur mon projet cinéma !</h2>

<?php

$titre = "Page d'accueil d'exo Cinéma VT";

?>
<!-- Carousel BOOTSTRAP -->
<div id="divCarousel">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $counter = 1;
            while ($data = $film->fetch()) {
            ?>
                <div class="carousel-item<?php if ($counter <= 1) {
                                                echo " active";
                                            } ?>">
                    <a href="index.php?action=detailFilm&id=<?= $data['id_film'] ?>"><img src="<?= $data['affiche'] ?>" class="d-block w-100" alt="Affiche du film <?= $data['titre'] ?>"></a>
                </div>
            <?php
                $counter++;
            }
            ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<?php
// Récupération et mise en mémoire tampon des données puis suppression
$contenu = ob_get_clean();

require "views/template.php";
