<?php
// session_start();
// if($_SESSION['user_role']!=1){
//  if($_SESSION['user_role'] == 3){
//  header('location: ./index.php');
//  }else{
//  header('location: ./index.php');
//  }
// }
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta name="robots" content="index, follow" />
    <meta property="og:title" content="Espace administration | e-Gnose" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://e-gnose.sfait.fr/assets/img/favicon.ico" />
    <meta property="og:url" content="https://e-gnose.sfait.fr/index-admin.php" />
    <meta property="og:description" content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta property="og:locale" content="fr_FR" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Espace administration | e-Gnose" />
    <meta name="twitter:description" content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta name="twitter:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png" />
    <title>Espace administration | e-Gnose</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">

    <!-- Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.usebootstrap.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css' rel="stylesheet">
    <link href="assets/css/administration.css" rel="stylesheet" type="text/css" media="screen">
    <script src="https://kit.fontawesome.com/d51f8b0cc0.js" crossorigin="anonymous" defer></script>
    <script src="https://e-gnose.sfait.fr/assets/js/showMovie.js" defer></script>
</head>

<body>

<?php
include_once('_navbar/navbar.php');
?>

<section class="services">
    <div class="container">

        <div class="title">
            <h1>Que souhaitez-vous administrer ?</h1>
        </div>
        <div class="title">
            <h3>Administrer des membres.</h3>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <a href="#">
                    <div class="icon-box">
                        <div class="icon"><i style="width: 80%" class="fa-solid fa-user-pen"></i></div>
                        <h4>Modifier un utilisateur</h4>
                        <p>Gérer les informations d'un compte déjà inscrit dans la base de données.</p>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                <a href="#">
                    <div class="icon-box">
                        <div class="icon"><i style="width: 80%" class="fa-solid fa-user-xmark"></i></div>
                        <h4>Supprimer un utilisateur</h4>
                        <p>Supprimer définitivement un compte déjà inscrit dans la base de données.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>


    <div class="container services">
        <div class="title">
            <h3>Administrer du contenu média.</h3>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <a href="#">
                    <div class="icon-box">
                        <div class="icon"><i style="width: 80%" class="fa-solid fa-plus"></i></div>
                        <h4>Ajouter un média</h4>
                        <p>Ajouter un nouveau contenu média dans la base de données.</p>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                <a href="#">
                    <div class="icon-box">
                        <div class="icon"><i style="width: 80%" class="fa-solid fa-pen"></i></div>
                        <h4>Modifier un média</h4>
                        <p>Modifier les informations d'un média déjà inscrit dans la base de données.</p>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                <a href="#">
                    <div class="icon-box">
                        <div class="icon"><i style="width: 80%" class="fa-solid fa-trash"></i></div>
                        <h4>Supprimer un média</h4>
                        <p>Supprimer définitivement un média existant de la base de données.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
include_once('_footer/footer.php');
?>

</body>

</html>