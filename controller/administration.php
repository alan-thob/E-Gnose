<?php
class Administration
{



    //Insert
    public function InsertFilm()
    {
        global $db;
        if (isset($_POST['insert_film'])) {
            $req = $db->prepare('INSERT INTO `films`(`id_film`,`film_city`,`film_titre`,`film_description`,`film_realisateur`,`film_cover_image`,`film_back_image`,`film_trailer`, 
            `film_duree`,`film_date`,`film_popularity`,`film_value`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
            $req->execute(array(
                $_POST['id_film'], $_POST['film_city'],
                $_POST['film_titre'], $_POST['film_description'], $_POST['film_realisateur'], $_POST['film_cover_image'],
                $_POST['film_back_image'], $_POST['film_trailer'], $_POST['film_duree'], $_POST['film_date'], $_POST['film_popularity'],
                $_POST['film_value']
            ));
        }
    }
    public function InsertGenre()
    {
        global $db;
        if (isset($_POST['insert_genres'])) {
            $req = $db->prepare('INSERT INTO `genres`(`genre`) VALUES(?)');
            $req->execute(array(
                $_POST['genre']
            ));
        }
    }


    // Modify
    public function ModifyFilm()
    {
        global $db;
        if (isset($_POST['film_date'])) {
            $modify = $db->prepare('UPDATE films SET film_city=?,film_titre=?,film_description=?,film_realisateur=?, film_cover_image =?, film_back_image =?,film_trailer=?, 
            film_duree=?, film_date=?, film_popularity=?, film_value=? WHERE id_film = ?');
            $modify->execute(array(
                $_POST['film_city'],
                $_POST['film_titre'], $_POST['film_description'], $_POST['film_realisateur'], $_POST['film_cover_image'],
                $_POST['film_back_image'], $_POST['film_trailer'], $_POST['film_duree'], $_POST['film_date'], $_POST['film_popularity'],
                $_POST['film_value'], $_POST['id_film']
            ));
            if ($modify) {
                echo "modification réussi sur l'id : <b>" . $_POST['id_film'] . ' - ' . $_POST['film_titre'] . "</b>";
            } else {
                echo "echec de la modification";
            }
        }
    }
    public function ModifyUser()
    {
        global $db;
        if (isset($_POST['user_email'])) {
            $modify = $db->prepare('UPDATE users SET user_nom=?, user_email=?,user_role=?,user_telephone=?,user_date_naissance=?, user_value=?,id_abonnement=? WHERE id_user=?');
            $modify->execute(array(
                $_POST['user_nom'], $_POST['user_email'],
                $_POST['user_role'], $_POST['user_telephone'],
                $_POST['user_date_naissance'], $_POST['user_value'],
                $_POST['id_abonnement'], $_POST['id_user']
            ));
            if ($modify) {
                echo "modification réussi sur l'id : <b>" . $_POST['id_user'] . ' - ' . $_POST['user_nom'] . "</b>";
            } else {
                echo "echec de la modification";
            }
        }
    }
    public function ModifyUserAccount()
    {
        global $db;
        if (isset($_POST['user_email'])) {
            $modify = $db->prepare('UPDATE users SET user_nom=?,user_prenom=?, user_email=?,user_address=?,user_city=?,user_country=?,user_cp=?,user_desc=? WHERE id_user=?');
            $modify->execute(array(
                $_POST['user_nom'], $_POST['user_prenom'], $_POST['user_email'],
                $_POST['user_address'], $_POST['user_city'],  $_POST['user_country'],
                $_POST['user_cp'], $_POST['user_desc'], $_SESSION['id_user']
            ));
            if ($modify) {
                echo "modification réussi sur : <b>" . $_POST['user_nom'] . "</b></br> Veuillez rafraichir la page.";
            } else {
                echo "echec de la modification";
            }
        }
    }
    public function ModifyGenre()
    {
        global $db;
        if (isset($_POST['genre'])) {
            $modify = $db->prepare('UPDATE genres SET genre=? WHERE id_genre=?');
            $modify->execute(array(
                $_POST['genre'], $_POST['id_genre']
            ));

            if ($modify) {
                echo "modification réussi sur l'id : <b>" . $_POST['id_genre'] . ' - ' . $_POST['genre'] . "</b>";
            } else {
                echo "echec de la modification";
            }
        }
    }


    // DELETE 
    public function DeleteFilm()
    {
        global $db;
        if (isset($_POST['id_film'])) {
            $req = $db->prepare('DELETE FROM `films` WHERE id_film= ?');
            $req->execute(array($_POST['id_film']));

            if ($req) {
                echo "suppression réussi sur l'id : <b>" . $_POST['id_film'] . ' - ' . $_POST['film_titre'] . "</b>";
            } else {
                echo "echec de la supression";
            }
        }
    }
    public function DeleteUser()
    {
        global $db;
        if (isset($_POST['id_user'])) {
            $req = $db->prepare('DELETE FROM `users` WHERE id_user= ?');
            $req->execute(array($_POST['id_user']));

            if ($req) {
                echo "suppression réussi sur l'id : <b>" . $_POST['id_user'] . ' - ' . $_POST['user_nom'] . "</b>";
            } else {
                echo "echec de la supression";
            }
        }
    }
    public function DeleteGenre()
    {
        global $db;
        if (isset($_POST['id_genre'])) {
            $req = $db->prepare('DELETE FROM `genres` WHERE id_genre= ?');
            $req->execute(array($_POST['id_genre']));

            if ($req) {
                echo "suppression réussi sur l'id : <b>" . $_POST['id_genre'] . ' - ' . $_POST['genre'] . "</b>";
            } else {
                echo "echec de la supression";
            }
        }
    }
    public function DeleteGenreFilm()
    {
        global $db;
        if (isset($_POST['id_genre'])) {
            $req = $db->prepare('DELETE FROM `genre_films` WHERE id_genre= ?');
            $req->execute(array($_POST['id_genre']));
        }
    }
    public function DeleteAbonnement()
    {
        global $db;
        if (isset($_POST['id_abonnement'])) {
            $req = $db->prepare('DELETE FROM `abonnement` WHERE id_abonnement= ?');
            $req->execute(array($_POST['id_abonnement']));
        }
    }
    public function DeleteCommentaire()
    {
        global $db;
        if (isset($_POST['id_commentaire'])) {
            $req = $db->prepare('DELETE FROM `laisser`, WHERE id_commentaire= ?');
            $req->execute(array($_POST['id_commentaire']));
        }
    }
    public function DeleteTag()
    {
        global $db;
        if (isset($_POST['id_tag'])) {
            $req = $db->prepare('DELETE FROM `tag` WHERE id_tag= ?');
            $req->execute(array($_POST['id_tag']));
        }
    }


    //SELECT USER
    public function SelectUser()
    {
            if (isset($_SESSION["id_user"])) {
                global $db;
                $req = $db->prepare('SELECT * FROM `users` WHERE id_user= ?');
                $req->execute(array($_SESSION["id_user"]));
            }

    }
    
    // SELECT FILM
    public function SelectFilm()
    {
            global $db;
            $req = $db->prepare('SELECT * FROM `films` ');
            $req->execute();
    }
    public function SelectFilmByDateAsc()
    {
            global $db;
            $allRessources = $db->query('SELECT * FROM films WHERE film_value = 1 ORDER BY film_date ASC LIMIT 10');
            $allRessources->execute();
    }
    
    
    
    // SELECT SERIE
    public function SelectSerie()
    {
        global $db;
        $req = $db->prepare('SELECT * FROM `series` ');
        $req->execute();
    }
    
    // SELECT LIVRE
    public function SelectLivre()
    {
        global $db;
        $req = $db->prepare('SELECT * FROM `livres` ');
        $req->execute();
    }
    // SELECT ACTEUR
    public function SelectActeur()
    {
        global $db;
        $acteur = $db->prepare('SELECT * FROM acteurs, personnage, films  WHERE acteurs.id_acteur = personnage.id_acteur AND personnage.id_film = films.id_film AND films.id_film = ? ORDER BY personnage.personnage_order ASC LIMIT 0,10');
        $acteur->bindParam(1, $id, PDO::PARAM_INT);
        $acteur->execute();
        if ($acteur->rowCount() > 0) {
            $count = 0;
            while ($acteurs = $acteur->fetch(PDO::FETCH_ASSOC)) { ?>
                <div>
                    <ul>
                        <li>
                            <p><?= $acteurs['acteur_nom'] ?></p>
                            <p><?= $acteurs['personnage_nom'] ?></p>
                            <img src="<?= $acteurs['acteur_img'] ?>" alt="" />
                        </li>
                    </ul>
                </div>
        <?php
            }
        }
    }
    // SELECT USER INFO
    public function SelectUserInfo()
    {
        global $db;
        global $donnees;
        $req = $db->prepare('SELECT * FROM `users` WHERE id_user= ?');
        $req->execute(array($_SESSION["id_user"]));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
    }
}

$administration = new Administration();
