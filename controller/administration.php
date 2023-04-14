<?php
require_once("../controller/singleton_connexion.php");

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
                echo "<p style='color: #15cf15;'>Les modifications du média <span style='font-weight: bold;'>" . $_POST['film_titre'] . " [" . $_POST['id_film'] . "] </span>" . "ont été effectuées avec succès !</p> ";
            } else {
                echo "<p style='color: #ff394c;'>Les modifications du média <span style='font-weight: bold;'>" . $_POST['film_titre'] . " [" . $_POST['id_film'] . "] </span>" . "n'ont pues être effectuées !</p> ";
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
                echo "<p style='color: #15cf15;'>Les modifications de l'utilisateur <span style='font-weight: bold;'>" . $_POST['user_nom'] . " [" . $_POST['id_user'] . "] </span>" . "ont été effectuées avec succès !</p> ";
            } else {
                echo "<p style='color: #ff394c;'>Les modifications de l'utilisateur <span style='font-weight: bold;'>" . $_POST['user_nom'] . " [" . $_POST['id_user'] . "] </span>" . "n'ont pues être effectuées !</p> ";
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
                echo "<p style='color: #15cf15;'>La modification du genre <span style='font-weight: bold;'>" . $_POST['genre'] . " [" . $_POST['id_genre'] . "] </span>" . "a été effectuée avec succès !</p> ";
            } else {
                echo "<p style='color: #ff394c;'>La modification du genre <span style='font-weight: bold;'>" . $_POST['genre'] . " [" . $_POST['id_genre'] . "] </span>" . "n'a pue être effectuée !</p> ";
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
}

$administration = new Administration();
