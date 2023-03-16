<?php
session_start();
require_once("../controller/singleton_connexion.php");
if ($_SESSION['user_nom']) {
    echo "Bonjour, " . $_SESSION["user_nom"];
} else {
    echo "pensez à vous inscrire";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/test.css">
    <script src="../js/showMovie.js" defer></script>
    <title>search barre</title>
</head>

<body>
    <form method="get" action="">

        <input type="search" name="searchdata" id="searchdata" onkeyup="showMovie(this.value)" placeholder="Rechercher un film, une sÃ©rie, un acteur..." autocomplete="off">
        <input type="submit" name="Envoyer">
    </form>

    <?php
    $allRessources = $db->query('SELECT * FROM films ORDER BY id_film DESC');
    if (isset($_GET['searchdata']) && !empty($_GET['searchdata'])) {
        $recherche = htmlspecialchars($_GET['searchdata']);
        $allRessources = $db->query('SELECT * FROM films WHERE film_titre LIKE "%' . $recherche . '%"');
    }
    ?>
    <section class="slideshow" style="height:100vh;">
        <div class="entire-content">
            <div id="txtMovie" class="content-carrousel">
                <?php
                if ($allRessources->rowCount() > 0) {
                    while ($ressources = $allRessources->fetch()) {
                        if($ressources['film_value'] == 1){
                            echo "<figure class='shadow'><a href='media.php?id=".$ressources['id_film']."'><img src='".$ressources['film_cover_image']."'/></a></figure>";
                        }
                    }
                } else {
                    echo "<p>Aucun mÃ©dia trouvÃ©</p>";
                }
                ?>
            </div>
        </div>
    </section>
</body>

</html>