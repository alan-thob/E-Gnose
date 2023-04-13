<!DOCTYPE html>
<html lang=fr>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
          content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="robots" content="index, follow"/>
    <meta property="og:title" content="Modifier un utilisateur | e-Gnose"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <meta property="og:url" content="https://e-gnose.sfait.fr/view/modify-user.php"/>
    <meta property="og:description"
          content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta property="og:locale" content="fr_FR"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Modifier un utilisateur | e-Gnose"/>
    <meta name="twitter:description"
          content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="twitter:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <title>Modifier un utilisateur | e-Gnose</title>

    <!-- Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.usebootstrap.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://e-gnose.sfait.fr/assets/img/favicon.png" rel="icon">
    <link href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css' rel="stylesheet">
    <link href="../assets/css/modify-pages.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body class="unselectable">

<?php
include_once('../_navbar/navbar.php');
?>

<section>
    <div class="container">
        <div class="title">
            <h1>Modifier un utilisateur</h1>
        </div>

        <div class="user_infos--container">
            <p>Sélectionnez l'utilisateur à modifier :</p>
            <form action="" method="post">
                <?php
                // On récupère tout le contenu de la table clients

                require_once("../controller/singleton_connexion.php");
                require_once("../controller/administration.php");
                global $db;
                ?>
                <select id="id" name="id">
                    <option disabled selected> Sélectionner un utilisateur </option>
                    <?php
                    $stmt = $db->prepare("SELECT id_user, user_nom FROM users");
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_user'] . '">' . $row['id_user'] . ' - ' . $row['user_nom'] . '</option>';
                    }
                    ?>
                </select>

                <input class="subscribe__btn" type="submit" value="Valider"/>
            </form>

            <?php
            echo'<hr>';
            if (isset($_POST['id'])) {
                $req = $db->prepare("SELECT * FROM users WHERE id_user = ?");
                $req->bindParam(1, $_POST['id'], PDO::PARAM_INT);
                $req->execute();
                $donnees = $req->fetch(PDO::FETCH_ASSOC);
                echo "Vous êtes en train de modifier le compte de : " . $donnees['user_nom'] . ' [' . $_POST['id'] .']' . "<br>";
                echo '<form action="" method="post">';
                // On affiche chaque entrée une à une

                echo '<input type="hidden" name="id_user" value="' . $donnees['id_user'] . '">';
                echo '<label for="user_nom">Nom :</label><input type="text" name="user_nom" value="' . $donnees['user_nom'] . '" required><br>';
                echo '<label for="user_email">Email :</label><input type="email" name="user_email" value="' . $donnees['user_email'] . '" required><br>';
                echo '<label for="user_role">Rôle :</label><input type="number" name="user_role" value="' . $donnees['user_role'] . '" min="1" max="3" required><br>';
                echo '<label for="user_telephone">Téléphone :</label><input type="text" name="user_telephone" value="' . $donnees['user_telephone'] . '" required><br>';
                echo '<label for="user_date_naissance">Date de naissance :</label><input type="date" name="user_date_naissance" value="' . $donnees['user_date_naissance'] . '" required><br>';
                echo '<label for="user_value">Valeur :</label><input type="number" name="user_value" value="' . $donnees['user_value'] . '" min="0" max="1" required><br>';
                echo '<label for="id_abonnement">ID d\'abonnement :</label><input type="number" name="id_abonnement" value="' . $donnees['id_abonnement'] . '" min="1" max="3" required><br>';
                echo "<input type='submit' value='Modifier' /><br />";
                echo "</form>";
            }
            $administration->ModifyUser();
            ?>
        </div>


    </div>
</section>

<?php
include_once('../_footer/footer.php');
?>

</body>

</html>