<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
</head>

<body>
    <center>
        <p>Veuillez selectionner l'immatriculation de l'embarcation à modifier:</p>
        <form action="" method='post'>
            <?php
            // On rcupre tout le contenu de la table clients

            require_once("../controller/singleton_connexion.php");
            require_once("../controller/administration.php");
            global $db;

            echo '<select id="choix" name="choix">
                    <option value="user">Utilisateurs</option>
                    <option value="film">Films</option>
                    <option value="genre">Genres</option>
                </select>
                <input type="submit" value="Valider" /><br />';


            if (isset($_POST['choix'])) {
                $choix = $_POST['choix'];
            ?>
                <select id="id" name="id">
                    <?php
                    $stmt = $db->query("SELECT id_" . $choix . " FROM " . $choix . "s");
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_' . $choix] . '">' . $row['id_' . $choix] . '</option>';
                    } ?>
                </select>
                <input type="submit" value="Valider" /><br />
        </form></br>

    <?php
                if (isset($_POST['id'])) {
                    $req = $db->prepare("SELECT * FROM " . $choix . "s WHERE id_" . $choix . " = " . $_POST['id'] . "");
                    $req->execute();
                    $donnees = $req->fetch(PDO::FETCH_ASSOC);
                    echo '<form action="" method="post">';
                    // On affiche chaque entrée une à une
                    if ($choix == "user") {
                        echo '<input type="int" name="id_user" value="' . $donnees['id_user'] . '"readonly> <br>';
                        echo '<input type="text" name="user_nom" value="' . $donnees['user_nom'] . '" required><br>';
                        echo '<input type="email" name="user_email" value="' . $donnees['user_email'] . '" required><br>';
                        echo '<input type="number" name="user_role" value="' . $donnees['user_role'] . '" min="1" max="3" required><br>';
                        echo '<input type="text" name="user_telephone" value="' . $donnees['user_telephone'] . '" required><br>';
                        echo '<input type="date" name="user_date_naissance" value="' . $donnees['user_date_naissance'] . '" required><br>';
                        echo '<input type="number" name="user_value" value="' . $donnees['user_value'] . '" min="0" max="1" required><br>';
                        echo '<input type="number" name="id_abonnement" value="' . $donnees['id_abonnement'] . '" min="1" max="3" required><br>';
                    } elseif ($choix == "film") {
                        echo '<input type="int" name="id_film" value="' . $donnees['id_film'] . '" readonly>' . "<br>";
                        echo '<input type="text" name="film_city" value="' . $donnees['film_city'] . '" requiered>' . "<br>";
                        echo '<input type="text" name="film_titre" value="' . $donnees['film_titre'] . '" requiered>' . "<br>";
                        echo '<input type="text" name="film_description" value="' . $donnees['film_description'] . '" requiered>' . "<br>";
                        echo '<input type="text" name="film_realisateur" value="' . $donnees['film_realisateur'] . '" requiered>' . "<br>";
                        echo '<input type="text" name="film_cover_image" value="' . $donnees['film_cover_image'] . '" requiered>' . "<br>";
                        echo '<input type="text" name="film_back_image" value="' . $donnees['film_back_image'] . '" requiered>' . "<br>";
                        echo '<input type="text" name="film_trailer" value="' . $donnees['film_trailer'] . '" requiered>' . "<br>";
                        echo '<input type="int" name="film_duree" value="' . $donnees['film_duree'] . '" requiered>' . "<br>";
                        echo '<input type="text" name="film_date" value="' . $donnees['film_date'] . '" requiered>' . "<br>";
                        echo '<input type="float" name="film_popularity" value="' . $donnees['film_popularity'] . '" requiered>' . "<br>";
                        echo '<input type="int" name="film_value" value="' . $donnees['film_value'] . '"  min="0" max="1" requiered>' . "<br>";
                    } elseif ($choix == "genre") {
                        echo '<input type="text" name="id_genre" value="' . $donnees['id_genre'] . '" readonly>' . "<br>";
                        echo '<input type="text" name="genre" value="' . $donnees['genre'] . '" requiered>' . "<br>";
                    }
                    echo "<input type='submit' value='modifier' /><br />";
                    echo "</form>";
                    if (isset($_POST['user_email'])) {
                        $modify = $db->prepare('UPDATE users SET user_nom=?, user_email=?,user_role=?,user_telephone=?,user_date_naissance=?, user_value=?,id_abonnement=? WHERE id_user=?');
                        $modify->execute(array(
                            $_POST['user_nom'], $_POST['user_email'],
                            $_POST['user_role'], $_POST['user_telephone'],
                            $_POST['user_date_naissance'], $_POST['user_value'],
                            $_POST['id_abonnement'], $_POST['id_user']
                        ));
                        if ($modify) {
                            echo "csqlckjnqmofiqhjofmhqefqef ok mecc";
                            var_dump($modify);
                        } else {
                            echo "not good";
                            var_dump($modify);
                            die();
                        }
                    }
                }
            }


    ?>
</body>

</html>