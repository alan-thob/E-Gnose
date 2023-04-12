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
            // On récupere tout le contenu de la table clients

            require_once("../controller/singleton_connexion.php");
            require_once("../controller/administration.php");
            global $db; ?>
            <select id="id" name="id">
                <?php
                $stmt = $db->query("SELECT id_genre, genre FROM genres");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    echo '<option value="' . $row['id_genre'] . '">' . $row['id_genre'] . ' - ' . $row['genre'] . '</option>';
                } ?>
            </select>
            <input type="submit" value="Valider" /><br />
        </form></br>

        <?php
        if (isset($_POST['id'])) {
            $req = $db->prepare("SELECT * FROM genres WHERE id_genre = ?");
            $req->bindParam(1, $_POST['id'], PDO::PARAM_INT);
            $req->execute();
            $donnees = $req->fetch(PDO::FETCH_ASSOC);

            echo "Vous êtes entrain de modifier : " . $_POST['id'] . ' - ' . $donnees['genre'] . "</br>";
            echo '<form action="" method="post">';
            // On affiche chaque entrée une à une

            echo '<input type="text" name="id_genre" value="' . $donnees['id_genre'] . '" readonly>' . "<br>";
            echo '<input type="text" name="genre" value="' . $donnees['genre'] . '" requiered>' . "<br>";
            echo "<input type='submit' value='modifier' /><br />";
            echo "</form>";
        }
        $administration->ModifyGenre();


        ?>
</body>

</html>