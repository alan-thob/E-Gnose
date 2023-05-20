<?php
if (isset($_POST["id_serie"])) {
    $id_user = $_SESSION["id_user"];
    $id_serie = $_GET["id"];
    // Suppression de la wishlist de la base de données
    $done = $db->prepare('SELECT * FROM wishlist WHERE id_serie = ? AND id_user = ?');
    $done->bindParam(1, $id_serie, PDO::PARAM_INT);
    $done->bindParam(2, $id_user, PDO::PARAM_INT);
    $done->execute();
    if ($done->rowCount() == 0) {
        $insert = $db->prepare('INSERT INTO wishlist (id_user, id_serie) VALUES (?, ?)');
        $insert->execute([$id_user, $id_serie]);
        if ($insert) {
            header('Location: ../view/wishlist.php');
            exit;
        }
    } else {
        header('Location: ../view/wishlist.php');
        exit;
    }
}
class serie
{
    public $id_serie;
    public  $serie_city;
    public  $serie_titre;
    public $serie_description_plus;
    public $serie_realisateur;
    public $serie_cover_image;
    public $serie_trailer;
    public $serie_nombre_episodes;
    public $serie_nombre_saison;
    public $serie_popularity;
    public $serie_value;

    public function getserie()
    {
        require_once("../controller/singleton_connexion.php");
        $database = Database::getInstance();
        $db = $database->getConnexion();
        $series = $db->prepare('SELECT * FROM series WHERE serie_value = :serie_value AND id_serie = :id_serie ORDER BY serie_titre DESC ');
        $series->bindValue(":serie_value", 1, PDO::PARAM_INT);
        $series->bindValue(":id_serie", $_GET["id"], PDO::PARAM_INT);
        $series->execute();
        if ($series->rowCount() > 0) {
            while ($serie = $series->fetch()) {
                $serie_city = $serie['serie_city'];
                $serie_titre = $serie['serie_titre'];
                $serie_description_plus = $serie['serie_description_plus'];
                $serie_realisateur = $serie['serie_realisateur'];
                $serie_cover_image = $serie['serie_cover_image'];
                $serie_back_cover = $serie['serie_back_cover'];
                $serie_trailer = $serie['serie_trailer'];
                $serie_nombre_episodes = $serie['serie_nombre_episodes'];
                $serie_nombre_saison = $serie['serie_nombre_saison'];
                $serie_popularity = $serie['serie_popularity'];
                $serie_value = $serie['serie_value'];
            }
            if ($serie_value == 1) {
                echo "
                <div class='details--content__section' style='background: linear-gradient(rgb(21, 192, 237, 0.5), rgb(7, 30, 83, 1)), url($serie_back_cover);background-repeat: no-repeat !important;background-size: cover;background-position: center;'>
                    <div class='poster--content'>
                        <div class='infos--content'>
                            <h1> $serie_titre</h1>
                            <p>Réalisateur : $serie_realisateur </p>
                            <p>Nombres d'épisodes : $serie_nombre_episodes </p>
                            <p>Nombres de saison : $serie_nombre_saison </p>
                            
                            <div class='stars'>
                                <p>Avis des internautes </p>
                                <i class='fa fa-star gold'></i>
                                <p> $serie_popularity/5</p>
                            </div>
            ";
                if (isset($_SESSION['id_user'])) {
                    $id_serie = $_GET['id'];
                    $done = $db->prepare('SELECT * FROM wishlist WHERE id_serie = ? AND id_user = ?');
                    $done->bindParam(1, $id_serie, PDO::PARAM_INT);
                    $done->bindParam(2, $_SESSION['id_user'], PDO::PARAM_INT);
                    $done->execute();
                    if ($done->rowCount() == 0) { ?>
                        <section>
                            <form method="POST" action="">
                                <input type="hidden" name="id_serie" value="<?php echo $id_serie ?>">
                                <button type="submit">Ajouter à la wishlist</button>
                            </form>
                        </section>
                        </div>
                    </div>
                </div>
<?php }
                }
            }
        }
    }
}
$serie = new serie();
