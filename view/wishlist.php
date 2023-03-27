<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_user'])) {
    header('Location: ./authentification.php');
    exit;
}

require_once('../controller/singleton_connexion.php');

// Récupérer la wishlist de l'utilisateur
$id_user = $_SESSION['id_user'];

$query = "SELECT wishlist.id_wishlist, wishlist.id_film, wishlist.created_at, films.id_film, films.film_titre
          FROM users, wishlist, films
            WHERE users.id_user = wishlist.id_user
        AND wishlist.id_film = films.id_film
        AND users.id_user = ?";

$result = $db->prepare($query);
$result->bindValue(1, $id_user, PDO::PARAM_INT);
$result->execute();
if (!$result) {
    die("Erreur : " . mysqli_error($db));
}

// Afficher la liste des films dans la wishlist
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ma wishlist</title>
</head>

<body>
    <h1>Ma wishlist</h1>

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

    <a href="index.php">Retour à la liste des films</a>
</body>

</html>