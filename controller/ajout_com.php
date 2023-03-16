<?php
require_once("../controller/singleton_connexion.php");
require_once("../model/comment_model.php");
function ajout_com()
{
    $userid = $_SESSION["id_user"];
    $id_ressources = $_GET["id"];
    if (!empty($_POST)) {
        if (isset($_POST["titre"], $_POST["content"], $_POST["stars"]) && !empty($_POST["titre"]) && !empty($_POST["content"]) && !empty($_POST["stars"])) {
            // Formulaire complet
            // RÃ©cupÃ©ration des donnÃ©es en les protÃ©geants
            // On retire les balises du titre
            $titre = strip_tags($_POST["titre"]);
            // On neutralise les balises du contenu
            $content = htmlspecialchars($_POST["content"]);

            // Enregistrer les donnÃ©es
            $sql = "INSERT INTO `commentaires`(`commentaire_titre`, `commentaire_text`, `commentaire_note`,`commentaire_value`) VALUES (:commentaire_titre, :commentaire_text, :commentaire_note, :commentaire_value)";

            // PrÃ©paration de la requÃªte
            $query = $db->prepare($sql);
            $query->bindValue(":commentaire_titre", $titre, PDO::PARAM_STR);
            $query->bindValue(":commentaire_text", $content, PDO::PARAM_STR);
            $query->bindValue(":commentaire_note", strval($_POST["stars"]), PDO::PARAM_STR);
            $query->bindValue(":commentaire_value", 1, PDO::PARAM_INT);
            // On execute
            if (!$query->execute()) {
                die("Une erreur est survenue");
            }

            $id = $db->lastInsertId();
            
        } else {
            die("le formulaire est incomplet");
        }
    }
}
?>
<?php  
if(isset($_SESSION['user_nom'])){
ajout_com();?>
<h1>Ajouter un commentaire</h1>

<form method="post">
    <div>
        <label for="titre"> Titre</label>
        <input type="text" name="titre" id="titre"></input>
    </div>
    <div>
        <label for="content"> Contenu</label>
        <input type="textarea" name="content" id="content"></input>
    </div>
    <div>
        <label for="stars"> Nombres d'Ã©toiles</label>
        <input type="number" name="stars" id="stars" max="5.0" min="1.0" maxlength="1.0" step="0.01"></input>
    </div>
    <input type="submit" value="OK">
</form>
<?php } ?>

<section>
    <div>
        <h2> Tous les commentaires</h2>
        <?php
            $comment->getComment();
        ?>
    </div>
</section>


<?php
?>