<?php
require_once("../controller/singleton_connexion.php");
class Commentaire
{
    public function getComment()
    {
        require_once("../controller/singleton_connexion.php");
        $id = $_GET["id"];
        $req = $db->prepare('SELECT DISTINCT commentaires.*,user.userfirstname,user.userlastname, user.userid FROM `users`,`laisser`,`commentaires`,`films` 
        WHERE user.userid = commentaire.userid AND commentaire.ressourcesid = ressources.ressourcesid 
        AND commentaire.commentvalue = 1 AND ressources.ressourcesid = ?');
        $req->bindValue(1, $id);
        $req->execute();
        if ($req->rowCount() > 0) {
            while ($result = $req->fetch()){
                echo  "<h1 class='text name'>Titre du commentaire :".strip_tags($result['commenttitle'])."</h1>
                <h6 class='text name'>le commentaire :".strip_tags($result['commenttext'])."</h6>
                <p>Le nombre d'étoile :" .$result['commentstars']."</p><br>
                <p>Le commentaire a été laissé par :".$result['userfirstname'] . " " . $result['userlastname']."</p><br>";
            }
        }
    }
}
$comment = new Commentaire();

?>