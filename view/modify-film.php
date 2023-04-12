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
            // On récupère tout le contenu de la table clients

            require_once("../controller/singleton_connexion.php");
            require_once("../controller/administration.php");
            global $db; ?>
            <select id="id" name="id">
                <?php
                $stmt = $db->query("SELECT id_film, film_titre FROM films");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    echo '<option value="' . $row['id_film'] . '">' . $row['id_film'] . ' - ' . $row['film_titre'] . '</option>';
                } ?>
            </select>
            <input type="submit" value="Valider" /><br />
        </form></br>

        <?php
        if (isset($_POST['id'])) {
            $req = $db->prepare("SELECT * FROM films WHERE id_film = ?");
            $req->bindParam(1, $_POST['id'], PDO::PARAM_INT);
            $req->execute();
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            
            echo "Vous êtes entrain de modifier : " . $_POST['id'] . ' - ' . $donnees['film_titre'] . "</br>";
            echo '<form action="" method="post">';
            // On affiche chaque entrée une à une

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
            echo "<input type='submit' value='modifier' /><br />";
            echo "</form>";
        }
        $administration->ModifyFilm();


        ?>
</body>

</html>