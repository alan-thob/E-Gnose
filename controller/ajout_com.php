<?php
require_once("https://e-gnose.sfait.fr/controller/singleton_connexion.php");
require_once("https://e-gnose.sfait.fr/model/comment_model.php");
function ajout_com()
{
    global $db;
    $id_user = $_SESSION["id_user"];
    $id_film = $_GET["id"];


    if (!empty($_POST)) {
        if (isset($_POST["titre"], $_POST["content"], $_POST["stars"]) && !empty($_POST["titre"]) && !empty($_POST["content"]) && !empty($_POST["stars"])) {
            // Formulaire complet
            // Récupération des données en les protégeants
            // On retire les balises du titre
            $titre = strip_tags($_POST["titre"]);
            // On neutralise les balises du contenu
            $content = htmlspecialchars($_POST["content"]);

            // Enregistrer les données
            $sql = "INSERT INTO `commentaires`(`commentaire_titre`, `commentaire_text`, `commentaire_note`,`commentaire_value`) VALUES (:commentaire_titre, :commentaire_text, :commentaire_note, :commentaire_value)";
            var_dump($sql);
            // Préparation de la requête
            $query = $db->prepare($sql);
            $query->bindValue(":commentaire_titre", $titre, PDO::PARAM_STR);
            $query->bindValue(":commentaire_text", $content, PDO::PARAM_STR);
            $query->bindValue(":commentaire_note", strval($_POST["stars"]), PDO::PARAM_STR);
            $query->bindValue(":commentaire_value", 1, PDO::PARAM_INT);

            // On execute
            if (!$query->execute()) {
                die("Une erreur est survenue");
            } elseif ($query->execute()) {
                $id = $db->lastInsertId();
                $sql2 = "INSERT INTO `laisser`(`id_user`, `id_commentaire`, `id_film`, `id_serie`,`id_livre`) VALUES (:id_user, :id_commentaire, :id_film, :id_serie, :id_livre)";
                // Préparation de la requête
                $query2 = $db->prepare($sql2);
                $query2->bindValue(":id_user", $id_user, PDO::PARAM_INT);
                $query2->bindValue(":id_commentaire", $id, PDO::PARAM_INT);
                $query2->bindValue(":id_film", $id_film, PDO::PARAM_INT);
                $query2->bindValue(":id_serie", 0, PDO::PARAM_INT);
                $query2->bindValue(":id_livre", 0, PDO::PARAM_INT);
                if (!$query2->execute()) {
                    die("Une erreur est survenue lors de l'ajout dans la table laisser");
                }
            }
        } else {
            die("le formulaire est incomplet");
        }
    }
}
?>
<?php
if (isset($_SESSION['user_nom'])) {
    ajout_com(); ?>
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
            <label for="stars"> Nombres d'étoiles</label>
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