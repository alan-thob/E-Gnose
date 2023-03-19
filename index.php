<?php session_start();
require_once("./controller/singleton_connexion.php");
if (isset($_SESSION['user_nom'])) {
    echo "Bonjour, " . $_SESSION["user_nom"];
} else {
    echo "pensez à vous inscrire";
} ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
          content="Films, livres, audio... Toute une bibliothèque pour vous divertir, oû que vous soyez, en illimité !"/>
    <meta name="robots" content="index, follow"/>
    <meta property="og:title" content="Accueil | e-Gnose"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <meta property="og:url" content="https://e-gnose.sfait.fr/"/>
    <meta property="og:description"
          content="Films, livres, audios... Toute une bibliothèque pour vous divertir, oû que vous soyez, en illimité !"/>
    <meta property="og:locale" content="fr_FR"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Accueil | e-Gnose"/>
    <meta name="twitter:description"
          content="Films, livres, audios... Toute une bibliothèque pour vous divertir, oû que vous soyez, en illimité !"/>
    <meta name="twitter:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <title>Accueil | e-Gnose</title>

    <!-- Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://e-gnose.sfait.fr/assets/img/favicon.png" rel="icon">
    <link href="https://cdn.usebootstrap.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="assets/css/home.css" rel="stylesheet" type="text/css" media="screen">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/d51f8b0cc0.js" crossorigin="anonymous" defer></script>
    <script src="https://e-gnose.sfait.fr/assets/js/showMovie.js" defer></script>
</head>

<body class="unselectable">

<?php
require_once("https://e-gnose.sfait.fr/controller/singleton_connexion.php");
require_once("https://e-gnose.sfait.fr/model/films_model.php");
include_once('https://e-gnose.sfait.fr/_navbar/navbar.php');
?>

<div id="carouselExampleIndicators" class="carousel slide my-carousel my-carousel" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active" style="background-image: url('assets/img/posters/the-last-of-us.png')">

        </div>
        <div class="carousel-item" style="background-image: url('assets/img/posters/coeurs-noirs.jpg')">

        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Précédent</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Suivant</span>
    </a>
</div>

<section id="carousel-content">
    <div class="container">

        <div class="title">
            <h3>Titres populaires</h3>
        </div>
        <div id="carousel0">
            <?php
            $allRessources = $db->query('SELECT * FROM films WHERE film_value = 1 ORDER BY id_film ASC LIMIT 10');
            if ($allRessources->rowCount() > 0) {
                while ($ressources = $allRessources->fetch()) {
                    echo "<div class='item'>
                <a href='./view/content.php?id=" . $ressources['id_film'] . "'>
                    <div class='item__image'><img src='" . $ressources['film_cover_image'] . "' alt=''></div>
                    <div class='item__body'>
                        <div class='item__title'> " . strip_tags($ressources['film_titre']) . " </div>
                        <div class='item__description'>" . substr($ressources['film_description'], 0, 200) . "... <br/><a href='./view/content.php?id=" . $ressources['id_film'] . "'>Lire la suite...</a></div>
                    </div>
                </a>
            </div>";
                }
            } else {
                echo "<p>Aucun média trouvé</p>";
            }
            ?>
        </div>
    </div>
</section>

<section id="carousel-content">
    <div class="container">

        <div class="title">
            <h3>Les mieux notés</h3>
        </div>
        <div id="carousel1">
            <?php
            $allRessources = $db->prepare('SELECT * FROM films WHERE film_value = 1 ORDER BY film_popularity DESC LIMIT 10');
            $allRessources->execute();
            if ($allRessources->rowCount() > 0) {
                while ($ressources = $allRessources->fetch()) {
                    echo "<div class='item'>
 <a href='./view/content.php?id=" . $ressources['id_film'] . "'>
 <div class='item__image'><img src='" . $ressources['film_cover_image'] . "' alt=''></div>
 <div class='item__body'>
 <div class='item__title'> " . strip_tags($ressources['film_titre']) . " </div>
 <div class='item__description'>" . substr($ressources['film_description'], 0, 200) . "... <br/>
 <a href='./view/content.php?id=" . $ressources['id_film'] . "'>Lire la suite...</a></div>
 </div>
 </a>
 </div>";
                }
            } else {
                echo "<p>Aucun média trouvé</p>";
            }
            ?>
        </div>
    </div>
</section>

<div class="cta--subscribe">
    <h2>Retrouvez vos contenus préférés oû vous voulez, quand vous voulez, en illimité sur <span>e</span>-Gnose.</h2>
    <a class="subscribe__btn" href="#">Je m'abonne !</a>
</div>


<?php
include_once('_footer/footer.php');
?>

<script src="https://cdn.usebootstrap.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="assets/js/carousel.js" async></script>
<!--<script src="assets/js/search-bar.js" async></script>-->


</body>

</html>