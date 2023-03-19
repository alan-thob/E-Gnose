<?php
class Film
{
    public $id_film;
    public  $film_city;
    public  $film_titre;
    public $film_description;
    public $film_realisateur;
    public $film_cover_image;
    public $film_trailer;
    public $film_duree;
    public $film_date;
    public $film_popularity;
    public $film_value;

    public function getFilm()
    {
        require_once("https://e-gnose.sfait.fr/controller/singleton_connexion.php");
        $database = Database::getInstance();
        $db = $database->getConnexion();
        $films = $db->prepare('SELECT * FROM films WHERE film_value = :film_value AND id_film = :id_film ORDER BY film_titre DESC ');
        $films->bindValue(":film_value", 1, PDO::PARAM_INT);
        $films->bindValue(":id_film", $_GET["id"], PDO::PARAM_INT);
        $films->execute();
        if ($films->rowCount() > 0) {
            while ($film = $films->fetch()) {
                $id_film = $film['id_film'];
                $film_city = $film['film_city'];
                $film_titre = $film['film_titre'];
                $film_description = $film['film_description'];
                $film_realisateur = $film['film_realisateur'];
                $film_cover_image = $film['film_cover_image'];
                $film_back_image = $film['film_back_image'];
                $film_trailer = $film['film_trailer'];
                $film_duree = $film['film_duree'];
                $film_date = explode("-", $film['film_date']);
                $film_popularity = $film['film_popularity'];
                $film_value = $film['film_value'];
            }
            if ($film_value == 1) {
                echo "<div class='details--content__section' style='background: linear-gradient(rgb(21, 192, 237, 0.5), rgb(7, 30, 83, 1)), url($film_back_image);background-repeat: no-repeat !important;
                background-size: cover;
                background-position: center;'>
                    <div class='poster--content'>
                        <div class='infos--content'>
                            <h1> $film_titre ($film_date[0])</h1>
                            <p>Réalisateur : $film_realisateur </p>
                            <p>Duree : $film_duree (min)</p>
                            <div class='stars'>
                                <p>Avis des internautes </p>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <p> $film_popularity/5</p>
                            </div>
                        </div>
            
                    </div>
                </div>
            ";
            }
        }
    }
}
$film = new Film();
