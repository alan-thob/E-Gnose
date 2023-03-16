<?php session_start();?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta name="robots" content="index, follow" />
    <meta property="og:title" content="Accueil | e-Gnose" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png" />
    <meta property="og:url" content="https://e-gnose.sfait.fr/" />
    <meta property="og:description" content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta property="og:locale" content="fr_FR" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Accueil | e-Gnose" />
    <meta name="twitter:description" content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta name="twitter:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png" />
    <title>Accueil | e-Gnose</title>

    <!-- Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://e-gnose.sfait.fr/assets/img/favicon.png" rel="icon">
    <link href="https://cdn.usebootstrap.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../assets/css/content-details.css" rel="stylesheet" type="text/css" media="screen">
    <script src="https://kit.fontawesome.com/d51f8b0cc0.js" crossorigin="anonymous" defer></script>
</head>

<body class="unselectable">

    <?php
    include_once('../_navbar/navbar.php');
    require_once("../controller/singleton_connexion.php");
    require_once("../model/films_model.php");
    // On vérifie que le média existe bien en récupérant son ID
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        // Si il n'existe pas, on le renvoie vers la page de recherche
        header("Location: search.php");
        exit;
    }
    // On stock l'id de la ressources dans une variable
    $id = $_GET['id'];
    // On va chercher le média é l'aide d'une requéte
    $sql = "SELECT * FROM films WHERE id_film = :id"; // :id = sécurité

    // On prépare la requéte
    $requete = $db->prepare($sql);

    // On injecte les paramétres en tranformant les informations en entier
    $requete->bindValue(":id", $id, PDO::PARAM_INT);

    // On éxécute
    $requete->execute();

    // On récupére le média
    $media = $requete->fetch();
    // On vérifie si le media est vide
    if (!$media) {
        // Erreur 404
        http_response_code(404);
        echo 'Média introuvable';
        exit;
    }
    ?>

    <section>
        <div>
            <?php
            if ($media['film_value'] == 1 && $media['id_film'] == $id) {
                $film->getFilm();
            } else {
                header("Location: ../index.php");
                exit;
            }
            ?>
        </div>
    </section>

    <section>
        <div>
            <?php include_once("../controller/ajout_com.php"); ?>
        </div>
    </section>
    <?php
    include_once('../_footer/footer.php');
    ?>