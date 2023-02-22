<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#"/>
    <meta name="robots" content="index, follow"/>
    <meta property="og:title" content="Accueil | E-Gnose"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="#"/>
    <meta property="og:url" content="https://e-gnose.sfait.fr/"/>
    <meta property="og:description" content="#"/>
    <meta property="og:locale" content="fr_FR"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Accueil | E-Gnose"/>
    <meta name="twitter:description" content="#"/>
    <meta name="twitter:image" content="#"/>
    <title>Accueil | E-Gnose</title>

    <!-- Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="assets/img/favicon.ico" rel="icon">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/home.css">
    <link href="assets/css/navbar.css" rel="stylesheet">


</head>

<body class="unselectable">

<?php
include_once('_navbar/navbar.php');
?>

<header>
    <div class="carousel-items">
        <h1>Films, livres, audios … Toute une bibliothèque<br>pour vous divertir, où que vous soyez, en illimité !</h1>
        <div class="search__bar">
            <div id="select">
                <p id="selectText">Toute catégorie</p>
                <img id="dropdown" src="assets/img/arrow-drop-down-fill.svg" alt="">
                <ul id="list">
                    <li class="options">Toutes les catégories</li>
                    <li class="options">Catégorie 1</li>
                    <li class="options">Catégorie 2</li>
                    <li class="options">Catégorie 3</li>
                </ul>
            </div>
            <input type="text" id="inputfield" placeholder="Rechercher un film, un livre, un audio, un ISBN ...">
        </div>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide my-carousel my-carousel" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url('assets/img/posters/the-last-of-us.png')">

            </div>
            <div class="carousel-item " style="background-image: url('assets/img/posters/coeurs-noirs.jpg')">

            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</header>

<section id="carousel-content">
    <div class="container">

        <div class="title">Titres populaires</div>
        <div id="carousel0">
            <div class="item">
                <div class="item__image"><img src="assets/img/carousel.jpg" alt=""></div>
                <div class="item__body">
                    <div class="item__title"> Contenu 1</div>
                    <div class="item__description"> Ici une petite description</div>
                </div>
            </div>
            <div class="item">
                <div class="item__image"><img src="assets/img/carousel.jpg" alt=""></div>
                <div class="item__body">
                    <div class="item__title"> Contenu 2</div>
                    <div class="item__description"> Ici une petite description</div>
                </div>
            </div>
            <div class="item">
                <div class="item__image"><img src="assets/img/carousel.jpg" alt=""></div>
                <div class="item__body">
                    <div class="item__title"> Contenu 3</div>
                    <div class="item__description"> Ici une petite description</div>
                </div>
            </div>
            <div class="item">
                <div class="item__image"><img src="assets/img/carousel.jpg" alt=""></div>
                <div class="item__body">
                    <div class="item__title"> Contenu 4</div>
                    <div class="item__description"> Ici une petite description</div>
                </div>
            </div>
            <div class="item">
                <div class="item__image"><img src="assets/img/carousel.jpg" alt=""></div>
                <div class="item__body">
                    <div class="item__title"> Contenu 5</div>
                    <div class="item__description"> Ici une petite description</div>
                </div>
            </div>
            <div class="item">
                <div class="item__image"><img src="assets/img/carousel.jpg" alt=""></div>
                <div class="item__body">
                    <div class="item__title"> Contenu 6</div>
                    <div class="item__description"> Ici une petite description</div>
                </div>
            </div>
        </div>

        <div class="title">Les mieux notés</div>
        <div id="carousel1">
            <div class="item">
                <div class="item__image"><img src="assets/img/carousel.jpg" alt=""></div>
                <div class="item__body">
                    <div class="item__title"> Contenu 1</div>
                    <div class="item__description"> Ici une petite description</div>
                </div>
            </div>
            <div class="item">
                <div class="item__image"><img src="assets/img/carousel.jpg" alt=""></div>
                <div class="item__body">
                    <div class="item__title"> Contenu 2</div>
                    <div class="item__description"> Ici une petite description</div>
                </div>
            </div>
            <div class="item">
                <div class="item__image"><img src="assets/img/carousel.jpg" alt=""></div>
                <div class="item__body">
                    <div class="item__title"> Contenu 3</div>
                    <div class="item__description"> Ici une petite description</div>
                </div>
            </div>
            <div class="item">
                <div class="item__image"><img src="assets/img/carousel.jpg" alt=""></div>
                <div class="item__body">
                    <div class="item__title"> Contenu 4</div>
                    <div class="item__description"> Ici une petite description</div>
                </div>
            </div>
            <div class="item">
                <div class="item__image"><img src="assets/img/carousel.jpg" alt=""></div>
                <div class="item__body">
                    <div class="item__title"> Contenu 5</div>
                    <div class="item__description"> Ici une petite description</div>
                </div>
            </div>
            <div class="item">
                <div class="item__image"><img src="assets/img/carousel.jpg" alt=""></div>
                <div class="item__body">
                    <div class="item__title"> Contenu 6</div>
                    <div class="item__description"> Ici une petite description</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="subscribe-cta">
    <div class="container">
        <h2>Retrouvez votre contenu préféré où vous voulez, quand vous voulez, en illimité sur <span class="logo-color">e</span>-Gnose.</h2>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
<script src="assets/js/carousel.js" async></script>
<script src="assets/js/search-bar.js" async></script>

</body>
</html>
