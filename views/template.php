<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>
    <script src="https://kit.fontawesome.com/81977f7aea.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
</head>


<body>

    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div id="divLogo" class="flex">
                <a id="logoAccueil" href="index.php?action=pageAccueil">ACCUEIL</a>
            </div>

            <div id="navDiv" class="flex">
                <a class="nav-link" href="index.php?action=listActeurs">Acteurs</a>
                <a class="nav-link" href="index.php?action=listFilm">Films</a>
                <a class="nav-link" href="index.php?action=listGenre">Genres</a>
                <a class="nav-link" href="index.php?action=listReal">Réalisateurs</a>
                <a class="nav-link" href="index.php?action=listRole">Rôles</a>
            </div>
        </nav>
    </header>


    <main>
        <!-- Variable contenu de la vue sélectionnée -->
        <?= $contenu ?>
    </main>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>