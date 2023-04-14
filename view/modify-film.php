<!DOCTYPE html>
<html lang=fr>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
          content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="robots" content="index, follow"/>
    <meta property="og:title" content="Modifier un média | e-Gnose"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <meta property="og:description"
          content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta property="og:locale" content="fr_FR"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Modifier un média | e-Gnose"/>
    <meta name="twitter:description"
          content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="twitter:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <title>Modifier un média | e-Gnose</title>

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
            <h1>Modifier un média</h1>
        </div>

        <div class="user_infos--container">
            <p>Sélectionnez le média à modifier :</p>
            <form action="" method='post'>

                <?php
                // On récupère tout le contenu de la table clients

                require_once("../controller/singleton_connexion.php");
                require_once("../controller/administration.php");
                global $db; ?>
                <select id="id" name="id">
                    <option disabled selected> Sélectionner un média</option>
                    <?php
                    $stmt = $db->query("SELECT id_film, film_titre FROM films");
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        echo '<option value="' . $row['id_film'] . '">' . $row['id_film'] . ' - ' . $row['film_titre'] . '</option>';
                    }
                    ?>
                </select>


                <input class="subscribe__btn" type="submit" value="Valider"/>
            </form>

            <?php
            if (isset($_POST['id'])) {
                $req = $db->prepare("SELECT * FROM films WHERE id_film = ?");
                $req->bindParam(1, $_POST['id'], PDO::PARAM_INT);
                $req->execute();
                $donnees = $req->fetch(PDO::FETCH_ASSOC);

                echo "Vous êtes en train de modifier le média : " . $donnees['film_titre'] . ' [ID: ' . $_POST['id'] . ']' . "<br>";
                echo '<form action="" method="post">';
                // On affiche chaque entrée une à une

                echo '<div class="form-group">

                <div class="form-group">
                <label for="film_city">Film City</label>
                    <input type="text" class="form-control" name="film_city" value="' . $donnees['film_city'] . '" required>
                </div>
                
                <div class="form-group">
                <label for="film_titre">Titre</label>
                    <input type="text" class="form-control" name="film_titre" value="' . $donnees['film_titre'] . '" required>
                </div>
                
                <div class="form-group">
                <label for="film_description">Description</label>
                    <input type="text" class="form-control" name="film_description" value="' . $donnees['film_description'] . '" required>
                </div>
                
                <div class="form-group">
                <label for="film_realisateur">Réalisateur(s)</label>
                    <input type="text" class="form-control" name="film_realisateur" value="' . $donnees['film_realisateur'] . '" required>
                </div>
                
                <div class="form-group">
                <label for="film_cover_image">Image de couverture</label>
                    <input type="text" class="form-control" name="film_cover_image" value="' . $donnees['film_cover_image'] . '" required>
                </div>
                
                <div class="form-group">
                <label for="film_back_image">Image d\'arrière-plan</label>
                    <input type="text" class="form-control" name="film_back_image" value="' . $donnees['film_back_image'] . '" required>
                </div>
                
                <div class="form-group">
                <label for="film_trailer">Trailer</label>
                    <input type="text" class="form-control" name="film_trailer" value="' . $donnees['film_trailer'] . '" required>
                </div>
                
                <div class="form-group">
                <label for="film_duree">Durée</label>
                    <input type="number" class="form-control" name="film_duree" value="' . $donnees['film_duree'] . '" required>
                </div>
                
                <div class="form-group">
                <label for="film_date">Date de publication</label>
                    <input type="date" class="form-control" name="film_date" value="' . $donnees['film_date'] . '" required>
                </div>
                
                <div class="form-group">
                <label for="film_popularity">Popularité</label>
                    <input type="number" step="0.1" class="form-control" name="film_popularity" value="' . $donnees['film_popularity'] . '" required>
                </div>
                
                <div class="form-group">
                <label for="film_value">Valeur</label>
                    <input type="number" class="form-control" name="film_value" value="' . $donnees['film_value'] . '" min="0" max="1" required>
                </div>';

                echo '<input class="subscribe__btn" type="submit" value="Modifier">';
                echo "</form>";
            }
            $administration->ModifyFilm();
            ?>
</body>

</html>