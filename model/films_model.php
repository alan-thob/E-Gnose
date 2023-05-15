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
        require_once("../controller/singleton_connexion.php");
        $database = Database::getInstance();
        $db = $database->getConnexion();
        $films = $db->prepare('SELECT * FROM films WHERE film_value = :film_value AND id_film = :id_film ORDER BY film_titre DESC ');
        $films->bindValue(":film_value", 1, PDO::PARAM_INT);
        $films->bindValue(":id_film", $_GET["id"], PDO::PARAM_INT);
        $films->execute();
        if ($films->rowCount() > 0) {
            while ($film = $films->fetch()) {
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
                echo "
                <div class='details--content__section' style='background: linear-gradient(rgb(21, 192, 237, 0.5), rgb(7, 30, 83, 1)), url($film_back_image);background-repeat: no-repeat !important;background-size: cover;background-position: center;'>
                        <div class='container-play-btn'>
                            <button class='button is-play' id='play-btn'>
                                <div class='button-outer-circle has-scale-animation'></div>
                                <div class='button-outer-circle has-scale-animation has-delay-short'></div>
                                <div class='button-icon is-play'>
                                    <svg height='100%' width='100%' fill='#fff'>
                                    <polygon class='triangle' points='5,0 30,15 5,30' viewBox='0 0 30 15'></polygon>
                                    <path class='path' d='M5,0 L30,15 L5,30z' fill='none' stroke='#fff' stroke-width='1'></path>
                                    </svg>
                                </div>        
                            </button>
                            <!-- modal -->
                            <div class='modal-overlay'>
                                <div class='modal'>
                                    <a class='close-modal'>
                                        <svg viewBox='0 0 20 20'>
                                            <path fill='#fff' d='M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z'></path>
                                        </svg>
                                    </a>
                                
                                    <div class='modal-content'>
                                      <iframe src='$film_trailer' allow='fullscreen;' autoplay='1' muted frameborder='0'></iframe>
                                    </div>
                                  </div>
                                </div>
                            </div><!-- End modal -->
                    <div class='poster--content'>
                        <div class='infos--content'>
                            <h1> $film_titre ($film_date[0])</h1>
                            <p>Réalisateur : $film_realisateur </p>
                            <p>Duree : $film_duree (min)</p>
                            
                            <div class='stars'>
                                <p>Avis des internautes </p>
                                <i class='fa fa-star gold'></i>
                                <i class='fa fa-star gold'></i>
                                <i class='fa fa-star gold'></i>
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
