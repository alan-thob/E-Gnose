<?php session_start();
require_once("../controller/singleton_connexion.php");
require_once('../controller/ControllerConnexion.php');
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="robots" content="index, follow"/>
    <meta property="og:title" content="Procédure de récupération du compte | e-Gnose"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <meta property="og:url" content="https://e-gnose.sfait.fr/view/forgot-password.php"/>
    <meta property="og:description" content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta property="og:locale" content="fr_FR"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Procédure de récupération du compte | e-Gnose"/>
    <meta name="twitter:description" content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="twitter:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <title>Procédure de récupération du compte | e-Gnose</title>

    <!-- Favicons -->
    <link href="../assets/img/favicon.ico" rel="icon">

    <!-- Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.usebootstrap.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-front">
                            <div class="center-wrap">
                                <div class="section text-center">
                                    <h4 class="mb-4 pb-3">Procédure de récupération du compte</h4>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input type="email" name="user_email" class="form-style"
                                                   placeholder="Adresse mail" id="user_email" autocomplete="off"
                                                   required>
                                            <i class="input-icon uil uil-at"></i>
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="password" name="user_password" class="form-style"
                                                   placeholder="Mot de passe" id="user_password" autocomplete="off"
                                                   required>
                                            <i class="input-icon uil uil-lock-alt"></i>
                                        </div>
                                        <div>
                                            <input type="submit" name="connexion" value="Suivant" class="btn mt-4">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>