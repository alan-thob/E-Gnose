<?php
session_start();
if(isset($_SESSION['user_role'])){
    if($_SESSION['user_role'] == 1){
        // l'utilisateur a un r�le d'administrateur
    } else if($_SESSION['user_role'] == 3){
        // l'utilisateur a un r�le de mod�rateur
        header('location: ../index.php');
        exit;
    } else {
        // l'utilisateur a un r�le ind�fini
        header('location: ../view/error/403.php');
        exit;
    }
} else {
    // la variable de session n'est pas initialis�e
    header('location: ../view/error/403.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang=fr>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
          content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="robots" content="index, follow"/>
    <meta property="og:title" content="Supprimer un compte utilisateur | e-Gnose"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <meta property="og:description"
          content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta property="og:locale" content="fr_FR"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Supprimer un compte utilisateur | e-Gnose"/>
    <meta name="twitter:description"
          content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="twitter:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <title>Supprimer un compte utilisateur | e-Gnose</title>

    <!-- Favicons -->
    <link href="../assets/img/favicon.ico" rel="icon">

    <!-- Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.usebootstrap.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css' rel="stylesheet">
    <link href="../assets/css/modify-pages.css" rel="stylesheet" type="text/css" media="screen">
    <script src="https://kit.fontawesome.com/d51f8b0cc0.js" crossorigin="anonymous" defer></script>
</head>

<body class="unselectable">

<?php
include_once('../_navbar/navbar.php');
?>

<section>
    <div class="container">
        <div class="title">
            <h1>Supprimer un compte utilisateur</h1>
        </div>

        <div class="user_infos--container">
            <p>Sélectionnez le compte utilisateur à supprimer :</p>

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
            <input class="subscribe__btn" type="submit" value="Valider"/>
        </form></br>

        <?php
        if (isset($_POST['id'])) {
            $req = $db->prepare("SELECT * FROM users WHERE id_user = ?");
            $req->bindParam(1, $_POST['id'], PDO::PARAM_INT);
            $req->execute();
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            echo "Vous voulez supprimer : " . $_POST['id'] . ' - ' . $donnees['user_nom'] . " ? </br>";
            echo '<form action="" method="post">';
            // On affiche chaque entrée une à une

            echo '<div class="form-group">
            <label for="id_user">ID de l\'utilisateur</label>
                <input type="number" class="form-control" name="id_user" value="' . $donnees['id_user'] . '" readonly>
            </div>

            <div class="form-group">
            <label for="user_nom">Nom de l\'utilisateur</label>
                <input type="text" class="form-control" name="user_nom" value="' . $donnees['user_nom'] . '" readonly>
            </div>

            <div class="form-group">
            <label for="user_email">Email de l\'utilisateur</label>
                <input type="email" class="form-control" name="user_email" value="' . $donnees['user_email'] . '" readonly>
            </div>
            
            <div class="form-group">
            <label for="user_role">Rôle de l\'utilisateur</label>
                <input type="number" class="form-control" name="user_role" value="' . $donnees['user_role'] . '" min="1" max="3" readonly>
            </div>
            
            <div class="form-group">
            <label for="user_telephone">Téléphone de l\'utilisateur</label>
                <input type="text" class="form-control" name="user_telephone" value="' . $donnees['user_telephone'] . '" readonly>
            </div>
            
            <div class="form-group">
            <label for="user_date_naissance">Date de naissance de l\'utilisateur</label>
                <input type="date" class="form-control" name="user_date_naissance" value="' . $donnees['user_date_naissance'] . '" readonly>
            </div>
            
            <div class="form-group">
            <label for="user_value">Valeur de l\'utilisateur</label>
                <input type="number" class="form-control" name="user_value" value="' . $donnees['user_value'] . '" min="0" max="1" readonly>
            </div>
            
            <div class="form-group">
            <label for="id_abonnement">ID de l\'abonnement</label>
                <input type="number" class="form-control" name="id_abonnement" value="' . $donnees['id_abonnement'] . '" min="1" max="3" readonly>
            </div>';

            echo '<input style="width: 15rem;" class="subscribe__btn" type="submit" value="Supprimer définitivement">';

            echo "</form>";
        }
        $administration->DeleteUser();
        ?>
        </div>
    </div>
</section>
</body>

</html>