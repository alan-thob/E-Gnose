<!DOCTYPE html>
<html lang=fr>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
          content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="robots" content="index, follow"/>
    <meta property="og:title" content="Modifier un genre | e-Gnose"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <meta property="og:url" content="https://e-gnose.sfait.fr/view/modify-genre.php"/>
    <meta property="og:description"
          content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta property="og:locale" content="fr_FR"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Modifier un genre | e-Gnose"/>
    <meta name="twitter:description"
          content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !"/>
    <meta name="twitter:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png"/>
    <title>Modifier un genre | e-Gnose</title>

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
    <input type="submit" value="Valider"/><br/>
</form>

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