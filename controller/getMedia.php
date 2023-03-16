<?php
require_once("../controller/singleton_connexion.php");
$m = $_GET["m"];
if (isset($_GET['searchdata']) || !empty($_GET['searchdata']) || isset($m) || !empty($m)) {
    $recherche = htmlspecialchars($m);
    $allRessources = $db->prepare('SELECT * FROM films WHERE film_titre LIKE "%' . $recherche . '%"');
    $allRessources->execute();
    if ($allRessources->rowCount() > 0) {
        while ($ressources = $allRessources->fetch()) {
?>

            <figure class="shadow"><a href="media.php?id=<?= $ressources['id_film'] ?>"><img src="<?= $ressources['film_cover_image'] ?>" /></a></figure>
        <?php
        }
    } else {
        ?>
        <p>Aucun média trouvé</p>
<?php
    }
}
?>