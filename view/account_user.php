<?php session_start();
require_once("../controller/singleton_connexion.php");
require_once('../controller/administration.php');
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta name="robots" content="index, follow" />
    <meta property="og:title" content="Authentification | e-Gnose" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png" />
    <meta property="og:url" content="https://e-gnose.sfait.fr/view/authentification.php" />
    <meta property="og:description" content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta property="og:locale" content="fr_FR" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Authentification | e-Gnose" />
    <meta name="twitter:description" content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta name="twitter:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png" />
    <title>Authentification | e-Gnose</title>

    <!-- Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.usebootstrap.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://e-gnose.sfait.fr/assets/img/favicon.png" rel="icon">
    <link href="../assets/css/authentification.css" rel="stylesheet" type="text/css" media="screen">
    <link href="../assets/css/user-account.css" rel="stylesheet" type="text/css" media="screen">
    <link href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css' rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>

<body class="unselectable">

    <?php
    include_once('../_navbar/navbar.php');
    require_once("../controller/administration.php");

    $administration->SelectUserInfo() 
    
    ?>

    <div class="main-content">
        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/user-bg.jpg); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Bonjour <?= $_SESSION["user_nom"] ?></h1>
                        <p class="text-white mt-0 mb-5">Ceci est votre page de profil. Vous pouvez voir vos données personnelles et les modifiers ainsi que changer votre photo <b>(beta)</b></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="../assets/img/user_icon.jpg" class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <div>

                                        </div>
                                        <div>

                                        </div>
                                        <div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3>
                                    <?= $donnees['user_prenom'] ." ". $donnees['user_nom']; ?>
                                </h3>
                                <?php
                                if(!empty($donnees['user_city']) || !empty($donnees['user__country'])){
                                ?>
                                <div class="h5 font-weight-300">
                                    <i class="ni location_pin mr-2"></i><?= $donnees['user_city']; ?>, <?= $donnees['user_country']; ?>
                                </div>
                                <?php 
                                }
                                if(!empty($donnees['user_desc'])){
                                ?>
                                <div class="h5 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i>Ma petite description :
                                </div>
                                <div>
                                    <i class="ni education_hat mr-2"></i><?= $donnees['user_desc']; ?>
                                </div>
                                <?php 
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Mon compte</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- On affiche chaque entrée une à une -->
                            <form action="" method="post">
                                <h6 class="heading-small text-muted mb-4">Vos informations</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email</label>
                                                <?= '<input type="email" id="input-email" class="form-control form-control-alternative" name="user_email" value="' . $donnees['user_email'] . '" required><br>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-first-name">Prenom</label>
                                                <?= '<input type="text" id="input-first-name" class="form-control form-control-alternative" name="user_prenom" value="' . $donnees['user_prenom'] . '"<br>'; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-last-name">Nom</label>
                                                <?= '<input type="text" id="input-last-name" class="form-control form-control-alternative" name="user_nom" value="' . $donnees['user_nom'] . '" required><br>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">


                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Où vous contacter ?</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-address">Adresse</label>
                                                <?= '<input type="text" id="input-address" class="form-control form-control-alternative" name="user_address" value="' . $donnees['user_address'] . '"<br>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-city">Ville</label>
                                                <?= '<input type="text" id="input-city" class="form-control form-control-alternative" name="user_city" value="' . $donnees['user_city'] . '"<br>'; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-country">Pays</label>
                                                <?= '<input type="text" id="input-country"  class="form-control form-control-alternative" name="user_country" value="' . $donnees['user_country'] . '"<br>'; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Code Postale</label>
                                                <?= '<input type="number" id="input-postal-code"  class="form-control form-control-alternative" name="user_cp" value="' . $donnees['user_cp'] . '"<br>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">


                                <!-- Description -->
                                <h6 class="heading-small text-muted mb-4">A propos de moi :</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group focused">
                                        <label>A propos : </label>
                                        <?= '<textarea rows="4" id="input-postal-code" name="user_desc" class="form-control form-control-alternative" placeholder="Quelques mots pour vous décrire ...">' . $donnees['user_desc'] . '</textarea><br>'; ?>
                                    </div>
                                </div>
                                <input class="subscribe__btn" type="submit" value="enregistrer les données" />
                            </form>
                            <?php $administration->ModifyUserAccount(); ?>
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