<?php
session_start();
require_once('../controller/singleton_connexion.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_user'])) {
    header('Location: https://e-gnose.sfait.fr/view/authentification.php');
    exit;
}
if (isset($_POST["id_film"])) {

    $id_film = $_POST["id_film"];
    
    // Suppression de la wishlist de la base de données
    $delete = $db->prepare('DELETE FROM wishlist WHERE id_user = ? AND id_film = ?');
    $delete->execute([$_SESSION['id_user'], $id_film]);
    if ($delete) {
        header("Location: https://e-gnose.sfait.fr/view/wishlist.php");
        exit;
    }
}
global $db;
// Récupérer la wishlist de l'utilisateur
$id_user = $_SESSION['id_user'];

$query = "SELECT wishlist.id_wishlist, wishlist.id_film, wishlist.created_at, films.id_film, films.film_titre, films.film_cover_image
 FROM users, wishlist, films
 WHERE users.id_user = wishlist.id_user
 AND wishlist.id_film = films.id_film
 AND users.id_user = ?";

$result = $db->prepare($query);
$result->bindValue(1, $id_user, PDO::PARAM_INT);
$result->execute();
if (!$result) {
    $error = $result->errorInfo();
    die("Erreur : " . $error[2]);
}

// Afficher la liste des films dans la wishlist
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description"
          content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="robots" content="index, follow"/>
    <meta property="og:title" content="Ma wishlist | e-Gnose"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <meta property="og:url" content="https://e-gnose.sfait.fr/view/wishlist.php"/>
    <meta property="og:description"
          content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta property="og:locale" content="fr_FR"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Ma wishlist | e-Gnose"/>
    <meta name="twitter:description"
          content="Films, livres, audios … Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="twitter:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <title>Ma wishlist | e-Gnose</title>

    <!-- Favicons -->
    <link href="../assets/img/favicon.ico" rel="icon">

    <!-- Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.usebootstrap.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../assets/css/wishlist.css" rel="stylesheet" type="text/css" media="screen">
    <script src="https://e-gnose.sfait.fr/assets/js/showMovie.js" defer></script>
    <script src="https://kit.fontawesome.com/d51f8b0cc0.js" crossorigin="anonymous" defer></script>
</head>

<body class="unselectable">

<?php
include_once('../_navbar/navbar.php');
?>

<section>
    <div class="container">

        <div class="title">
            <h1>Ma wishlist</h1>
        </div>

        <div class="user_infos--container">
            <?php if ($result->rowCount() == 0) : ?>
                <h2 class="text-center">Votre wishlist est vide</h2>
                <input class="subscribe__btn" type="button" onclick="history.back(-1)" value="Retourner en arrière" />
            <?php else : ?>
            <div class="films">
                <?php $count = 0; ?>
                <?php while ($row = $result->fetch()) : ?>
                    <?php if ($count % 4 == 0) : ?>
                        <div class="ligne">
                    <?php endif; ?>
                    <div class="film">
                        <a href="../view/content.php?id=<?php echo $row['id_film'] ?>"><img src="<?php echo $row['film_cover_image']; ?>" alt="<?php echo $row['film_titre']; ?>"></a>
                        <p><?php echo $row['film_titre']; ?></p>
                        <form id="wishlist-form" method="POST" action="">
                            <input type="hidden" name="id_film" value="<?php echo $row['id_film']; ?>">
                            <button class="delete-btn" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                    <?php if (($count + 1) % 4 == 0) : ?>
                        </div>
                    <?php endif; ?>
                    <?php $count++; ?>
                <?php endwhile; ?>
                <?php if ($count % 4 != 0) : ?>
            </div>
        <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php
include_once('../_footer/footer.php');
?>

<script src="https://cdn.usebootstrap.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>

</html>