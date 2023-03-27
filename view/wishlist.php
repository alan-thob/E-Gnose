<?php
session_start();

// Vérifier si l'utilisateur est connecté
//if (!isset($_SESSION['id_user'])) {
   // header('Location: https://e-gnose.sfait.fr/view/authentification.php');
   // exit;
//}

require_once('../controller/singleton_connexion.php');
GLOBAL $db;
// Récupérer la wishlist de l'utilisateur
// $id_user = $_SESSION['id_user'];

$query = "SELECT wishlist.id_wishlist, wishlist.id_film, wishlist.created_at, films.id_film, films.film_titre
 FROM users, wishlist, films
 WHERE users.id_user = wishlist.id_user
 AND wishlist.id_film = films.id_film
 AND users.id_user = ?";

$result = $db->prepare($query);
//$result->bindValue(1, $id_user, PDO::PARAM_INT);
//$result->execute();
if (!$result) {
    $error = $result->errorInfo();
    die("Erreur : " . $error[2]);
}

// Afficher la liste des films dans la wishlist
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta name="robots" content="index, follow" />
    <meta property="og:title" content="Ma wishlist | e-Gnose" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png" />
    <meta property="og:url" content="https://e-gnose.sfait.fr/view/wishlist.php" />
    <meta property="og:description" content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta property="og:locale" content="fr_FR" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Ma wishlist | e-Gnose" />
    <meta name="twitter:description" content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta name="twitter:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png" />
    <title>Ma wishlist | e-Gnose</title>

    <!-- Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://e-gnose.sfait.fr/assets/img/favicon.png" rel="icon">
    <link href="https://cdn.usebootstrap.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../assets/css/wishlist.css" rel="stylesheet" type="text/css" media="screen">

    <script src="https://e-gnose.sfait.fr/assets/js/showMovie.js" defer></script>
</head>

<body class="unselectable">

    <h1>Ma wishlist</h1>

    <?php
    include_once('../_navbar/navbar.php');
    ?>

    <ul>
        <?php while ($row = $result->fetch()) : ?>
        
            <li>
                <?php echo $row['film_titre']; ?>
                <form method="POST" action="../controller/remove_from_wishlist.php">
                    <input type="hidden" name="id_film" value="<?php echo $row['id_film']; ?>">
                    <button type="submit">Retirer</button>
                </form>
            </li>
        <?php endwhile; ?>
    </ul>

    <a href="https://e-gnose.sfait.fr/index.php">Retour à la liste des films</a>
</body>

</html>