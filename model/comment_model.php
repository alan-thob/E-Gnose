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
            while ($result = $req->fetch()){
                echo  "<h1 class='text name'>Titre du commentaire :".strip_tags($result['commentaire_titre'])."</h1>
                <h6 class='text name'>le commentaire :".strip_tags($result['commentaire_text'])."</h6>
                <p>Le nombre d'étoile :" .$result['commentaire_note']."</p><br>
                <p>Le commentaire a été laissé par :".$result['user_nom']."</p><br>";
            }
        }
    }
}
$comment = new Commentaire();

?>