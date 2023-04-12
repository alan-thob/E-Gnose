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
                $stmt = $db->query("SELECT id_user, user_nom FROM users");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    echo '<option value="' . $row['id_user'] . '">' . $row['id_user'] . ' - ' . $row['user_nom'] . '</option>';
                } ?>
            </select>
            <input type="submit" value="Valider" /><br />
        </form></br>

        <?php
        if (isset($_POST['id'])) {
            $req = $db->prepare("SELECT * FROM users WHERE id_user = ?");
            $req->bindParam(1, $_POST['id'], PDO::PARAM_INT);
            $req->execute();
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            echo "Vous êtes entrain de modifier : " . $_POST['id'] . ' - ' . $donnees['user_nom'] . "</br>";
            echo '<form action="" method="post">';
            // On affiche chaque entrée une à une

            echo '<input type="int" name="id_user" value="' . $donnees['id_user'] . '"readonly> <br>';
            echo '<input type="text" name="user_nom" value="' . $donnees['user_nom'] . '" required><br>';
            echo '<input type="email" name="user_email" value="' . $donnees['user_email'] . '" required><br>';
            echo '<input type="number" name="user_role" value="' . $donnees['user_role'] . '" min="1" max="3" required><br>';
            echo '<input type="text" name="user_telephone" value="' . $donnees['user_telephone'] . '" required><br>';
            echo '<input type="date" name="user_date_naissance" value="' . $donnees['user_date_naissance'] . '" required><br>';
            echo '<input type="number" name="user_value" value="' . $donnees['user_value'] . '" min="0" max="1" required><br>';
            echo '<input type="number" name="id_abonnement" value="' . $donnees['id_abonnement'] . '" min="1" max="3" required><br>';
            echo "<input type='submit' value='modifier' /><br />";
            echo "</form>";
        }
        $administration->ModifyUser();
        ?>
</body>

</html>