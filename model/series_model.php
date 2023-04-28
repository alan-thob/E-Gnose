<?php
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
                        <div class='container-play-btn'>
                            <button class='button is-play'  onclick=\"show('popup1')\">
                                <div class='button-outer-circle has-scale-animation'></div>
                                <div class='button-outer-circle has-scale-animation has-delay-short'></div>
                                <div class='button-icon is-play'>
                                    <svg height='100%' width='100%' fill='#fff'>
                                    <polygon class='triangle' points='5,0 30,15 5,30' viewBox='0 0 30 15'></polygon>
                                    <path class='path' d='M5,0 L30,15 L5,30z' fill='none' stroke='#fff' stroke-width='1'></path>
                                    </svg>
                                </div>        
                            </button>
                            <div class='popup' id='popup1'>
                            <iframe src='$serie_trailer' frameborder='0'></iframe>
                            <div class='blob-txt'><a href='#' onclick=\"hide('popup1')\"><br>Ok!</a></div>
                        </div>
                        </div>
                    <div class='poster--content'>
                        <div class='infos--content'>
                            <h1> $serie_titre</h1>
                            <p>Réalisateur : $serie_realisateur </p>
                            <p>Nombres d'épisodes : $serie_nombre_episodes </p>
                            <p>Nombres de saison : $serie_nombre_saison </p>
                            
                            <div class='stars'>
                                <p>Avis des internautes </p>
                                <i class='fa fa-star gold'></i>
                                <i class='fa fa-star gold'></i>
                                <i class='fa fa-star gold'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <p> $serie_popularity/5</p>
                            </div>
                        </div>
                    </div>
                </div>
            ";
            }
        }
    }
}
$serie = new serie();
