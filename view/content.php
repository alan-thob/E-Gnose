<?php session_start(); ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta name="robots" content="index, follow" />
    <meta property="og:title" content="Contenu | e-Gnose" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png" />
    <meta property="og:url" content="https://e-gnose.sfait.fr/view/content.php" />
    <meta property="og:description" content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta property="og:locale" content="fr_FR" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Contenu | e-Gnose" />
    <meta name="twitter:description" content="Films, livres, audios | Toute une bibliothèque pour vous divertir, où que vous soyez, en illimité !" />
    <meta name="twitter:image" content="https://e-gnose.sfait.fr/assets/img/favicon.png" />
    <title>Contenu | e-Gnose</title>

    <!-- Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://e-gnose.sfait.fr/assets/img/favicon.png" rel="icon">
    <link href="https://cdn.usebootstrap.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../assets/css/content-details.css" rel="stylesheet" type="text/css" media="screen">

    <script src="https://e-gnose.sfait.fr/assets/js/showMovie.js" defer></script>
</head>

<body class="unselectable">

    <?php
    include_once('../_navbar/navbar.php');
    require_once("../controller/singleton_connexion.php");
    require_once("../model/films_model.php");
    // On vérifie que le média existe bien en récupérant son ID
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        // S'il n'existe pas, on le renvoie vers la page de recherche
        header("Location: ../index.php");
        exit;
    }
    // On stock l'id de la ressource dans une variable
    $id = $_GET['id'];
    // On va chercher le média Ã  l'aide d'une requéte
    $sql = "SELECT * FROM films WHERE id_film = :id"; // :id = sécurité

    // On prépare la requéte
    $requete = $db->prepare($sql);

    // On injecte les paramétres en tranformant les informations en entier
    $requete->bindValue(":id", $id, PDO::PARAM_INT);

    // On exécute
    $requete->execute();

    // On récupère le média
    $media = $requete->fetch();
    // On vérifie si le média est vide
    if (!$media) {
        // Erreur 404
        http_response_code(404);
        echo 'Média introuvable';
        exit;
    }
    ?>

    <section style="padding-bottom: 0;">
        <div>
            <?php
            if ($media['film_value'] == 1 && $media['id_film'] == $id) {
                $film->getFilm();
            } else {
                header("Location: ../index.php");
                exit;
            }
            ?>
        </div>
    </section>

    <section style="padding-top: 0;">
        <div>
            <div class="tabs">
                <div role="tablist" aria-label="tabs component" class="tabs-btn-container">
                    <button role="tab" aria-controls="panel-details" id="tab-1" type="button" aria-selected="true" tabindex="0" class="tab active-tab">
                        Détails
                    </button>
                    <button role="tab" aria-controls="panel-comments" id="tab-2" type="button" aria-selected="false" tabindex="-1" class="tab">
                        Commentaires
                    </button>
                </div>
                <div id="panel-details" role="tabpanel" tabindex="0" aria-labelledby="tab-1" class="tab-content active-tab-content">
                    <h3>TEST.</h3>
                    <?php if (isset($_SESSION['id_user'])) {
                        $done = $db->prepare('SELECT * FROM wishlist WHERE id_film = ? AND id_user = ?');
                        $done->bindParam(1, $id, PDO::PARAM_INT);
                        $done->bindParam(2, $_SESSION['id_user'], PDO::PARAM_INT);
                        $done->execute();
                        if ($done->rowCount() == 0) { ?>
                            <section>
                                <form method="POST" action="../controller/add_to_wishlist.php">
                                    <input type="hidden" name="id_film" value="<?php echo $id ?>">
                                    <button type="submit">Ajouter à  la wishlist</button>
                                </form>
                            </section>
                    <?php }
                    } ?>
                    
                    
                    
                    <section>
                    <h3>Les acteurs :</h3>
                    <?php 
                        $acteur = $db->prepare('SELECT * FROM acteurs, personnage, films  WHERE acteurs.id_acteur = personnage.id_acteur AND personnage.id_film = films.id_film AND films.id_film = ? ORDER BY personnage.personnage_order ASC LIMIT 0,10');
                        $acteur->bindParam(1, $id, PDO::PARAM_INT);
                        $acteur->execute();
                        
                        if ($acteur->rowCount() > 0) { 
                            $count = 0;
                            while($acteurs = $acteur->fetch(PDO::FETCH_ASSOC)){?>
                            <div>
                                <ul>
                                    <li>
                                        <p><?= $acteurs['acteur_nom'] ?></p>
                                        <p><?= $acteurs['personnage_nom'] ?></p>
                                        <img src="<?= $acteurs['acteur_img'] ?>" alt=""/>
                                    </li>
                                </ul>
                            </div>
                    <?php
                        } 
                    } 
                    ?>
                    
                    </section>
                    
                    
                    <p>
                        Bonjour, ceci est un test pour les détails
                    </p>
                </div>

                <div id="panel-comments" role="tabpanel" tabindex="0" aria-labelledby="tab-2" class="tab-content">
                    <?php include_once("../controller/ajout_com.php"); ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    include_once('../_footer/footer.php');
    ?>

    <script>
        const tabs = [...document.querySelectorAll('.tab')]

        tabs.forEach(tab => tab.addEventListener("click", tabsAnimation))

        const tabContents = [...document.querySelectorAll(".tab-content")]

        function tabsAnimation(e) {

            const indexToRemove = tabs.findIndex(tab => tab.classList.contains("active-tab"))

            tabs[indexToRemove].setAttribute("aria-selected", "false")
            tabs[indexToRemove].setAttribute("tabindex", "-1")
            tabs[indexToRemove].classList.remove("active-tab");
            tabContents[indexToRemove].classList.remove("active-tab-content");

            const indexToShow = tabs.indexOf(e.target)

            tabs[indexToShow].setAttribute("tabindex", "0")
            tabs[indexToShow].setAttribute("aria-selected", "true")
            tabs[indexToShow].classList.add("active-tab")
            tabContents[indexToShow].classList.add("active-tab-content")
        }

        tabs.forEach(tab => tab.addEventListener("keydown", arrowNavigation))

        let tabFocus = 0;

        function arrowNavigation(e) {

            if (e.keyCode === 39 || e.keyCode === 37) {
                tabs[tabFocus].setAttribute("tabindex", -1)

                if (e.keyCode === 39) {
                    tabFocus++;

                    if (tabFocus >= tabs.length) {
                        tabFocus = 0;
                    }
                } else if (e.keyCode === 37) {
                    tabFocus--;

                    if (tabFocus < 0) {
                        tabFocus = tabs.length - 1;
                    }
                }

                tabs[tabFocus].setAttribute("tabindex", 0)
                tabs[tabFocus].focus()
            }

        }
    </script>
</body>

</html>