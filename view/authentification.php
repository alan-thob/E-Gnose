<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
          content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="robots" content="index, follow"/>
    <meta property="og:title" content="Authentification | e-Gnose"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <meta property="og:url" content="https://e-gnose.sfait.fr/view/authentification.php"/>
    <meta property="og:description"
          content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta property="og:locale" content="fr_FR"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Authentification | e-Gnose"/>
    <meta name="twitter:description"
          content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="twitter:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <title>Authentification | e-Gnose</title>

    <!-- Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.usebootstrap.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://e-gnose.sfait.fr/assets/img/favicon.png" rel="icon">
    <link href="../assets/css/authentification.css" rel="stylesheet" type="text/css" media="screen">
    <link href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css' rel="stylesheet">
</head>
<body class="unselectable">

<?php
include_once('../_navbar/navbar.php');
?>


<div class="section">
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <h6 class="mb-0 pb-3"><span>Connexion</span><span class="separator">|</span><span>Inscription</span></h6>
                    <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                    <label for="reg-log"></label>
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="mb-4 pb-3">Connexion</h4>
                                        <div class="form-group">
                                            <input type="email" name="logemail" class="form-style"
                                                   placeholder="Adresse mail" id="logemail" autocomplete="off">
                                            <i class="input-icon uil uil-at"></i>
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="password" name="logpass" class="form-style"
                                                   placeholder="Mot de passe" id="logpass" autocomplete="off">
                                            <i class="input-icon uil uil-lock-alt"></i>
                                        </div>
                                        <a href="#" class="btn mt-4">Se connecter</a>
                                        <p class="mb-0 mt-4 text-center"><a href="#" class="link">Mot de passe oublié
                                                ?</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-back">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="mb-4 pb-3">Inscription</h4>
                                        <div class="form-group">
                                            <input type='text' name="user_nom" placeholder="Votre nom" required maxlength="30"  class="form-style"/><br />
                                                   placeholder="Nom complet" id="logname" autocomplete="off">
                                            <i class="input-icon uil uil-user"></i>
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="email" name="logemail" class="form-style"
                                                   placeholder="Adresse mail" id="logemail" autocomplete="off">
                                            <i class="input-icon uil uil-at"></i>
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="password" name="logpass" class="form-style"
                                                   placeholder="Mot de passe" id="logpass" autocomplete="off">
                                            <i class="input-icon uil uil-lock-alt"></i>
                                        </div>
                                        <a href="#" class="btn mt-4">S'inscrire</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('../_footer/footer.php');
?>


</body>
</html>
