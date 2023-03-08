<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
          content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="robots" content="index, follow"/>
    <meta property="og:title" content="Connexion à l'espace client | e-Gnose"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <meta property="og:url" content="https://e-gnose.sfait.fr/"/>
    <meta property="og:description"
          content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta property="og:locale" content="fr_FR"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Connexion à l'espace client | e-Gnose"/>
    <meta name="twitter:description"
          content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="twitter:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <title>Connexion à l'espace client | e-Gnose</title>

    <!-- Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://e-gnose.sfait.fr/assets/img/favicon.png" rel="icon">
    <link href="../assets/css/account-connection.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body class="unselectable">

<?php
include_once('../_navbar/navbar.php');
?>

<div class="content">
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Créer mon compte</h1>

                <input type="text" placeholder="Nom"/>
                <input type="email" placeholder="Email"/>
                <input type="password" placeholder="Mot de passe"/>
                <button>S'inscrire</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Se connecter</h1>

                <input type="email" placeholder="Email"/>
                <input type="password" placeholder="Mot de passe"/>
                <a href="#">Mot de passe oublié ?</a>
                <button>Connexion</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Déjà client ?</h1>
                    <p>On s'est pas déjà vu quelque part ?👇</p>
                    <button class="ghost" id="signIn">Se connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Nouveau client</h1>
                    <p>Il semblerait que nous ne nous soyons jamais croisés. Inscrivez-vous dès maintenant ! 👇</p>
                    <button class="ghost" id="signUp">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('../_footer/footer.php');
?>

<!-- partial -->
<script src="../assets/js/account-connection.js"></script>


</body>
</html>
