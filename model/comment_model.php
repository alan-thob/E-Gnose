<?php
require_once("../controller/singleton_connexion.php");

class Commentaire
{
    public function getComment()
    {
        global $db;
        $id = $_GET["id"];
        $req = $db->prepare('SELECT DISTINCT commentaires.*,users.user_nom FROM `users`,`laisser`,`commentaires`,`films` 
 WHERE users.id_user = laisser.id_user AND laisser.id_commentaire = commentaires.id_commentaire AND laisser.id_film = films.id_film
 AND commentaires.commentaire_value = 1 AND films.id_film = ?');
        $req->bindValue(1, $id);
        $req->execute();
        if ($req->rowCount() > 0) {
            while ($result = $req->fetch()) {
                echo "
 <div class='container'>
 <div class='user_feedback--container'>
 <p>Auteur(e) : " . $result['user_nom'] . "</p>
 <p class='text name'>" . strip_tags($result['commentaire_text']) . "</p>
 <p style='margin-bottom: 0'>Note attribuée : " . $result['commentaire_note'] . " <i class='fa fa-star gold'></i></p>
 </div>
 </div>";

            }
        } else {
            echo "<p>Aucun commentaire n'a été publié.</p>";
        }
    }
}

$comment = new Commentaire();

?>