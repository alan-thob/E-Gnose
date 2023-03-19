<div id="header" class="wrapper">
    <nav>
        <input type="checkbox" id="show-search">
        <input type="checkbox" id="show-menu">
        <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
        <div class="content-navbar">
            <ul class="links">
                <li><a href="https://e-gnose.sfait.fr/">Accueil</a></li>
                <li>
                    <a href="#" class="desktop-link">Catégories</a>
                    <input type="checkbox" id="show-features">
                    <label for="show-features">Catégories</label>
                    <ul>
                        <li><a href="https://e-gnose.sfait.fr/view/categorie.php">Catégories 1</a></li>
                        <li><a href="https://e-gnose.sfait.fr/view/categorie.php">Catégories 2</a></li>
                        <li><a href="https://e-gnose.sfait.fr/view/categorie.php">Catégories 3</a></li>
                        <li><a href="https://e-gnose.sfait.fr/view/categorie.php">Catégories 4</a></li>
                    </ul>
                </li>
                <li><a href="#">Ma wishlist</a></li>
            </ul>
            <div class="logo">
                <a href="https://e-gnose.sfait.fr/"><span>e</span>-Gnose</a>
            </div>
        </div>

        <?php
        if (isset($_SESSION['id_user']) && $_SESSION['id_user'] != null) {
            echo '
                <li><a href="#" class="desktop-link"><i class="fa-solid fa-link"></i></a>
                <input type="checkbox" id="show-features">
                <label for="show-features">Bonjour; ' . $_SESSION['user_nom'] . '</label>
            <ul>
                <li><a href="https://e-gnose.sfait.fr/view/account_user.php">Mon Compte</a></li>
                <li><a href="https://e-gnose.sfait.fr/_navbar/deconnexion.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
        </li>';
        } else {
            echo '<a class="icons2" href="https://e-gnose.sfait.fr/view/authentification.php"><i class="far fa-user-circle"></i></a>';
        }
        ?>
    <label for="show-search" class="icons search-icon"><i class="fas fa-search"></i></label>
        <form method="get" action="" class="search-box">
            <input type="search" name="searchdata" id="searchdata" onkeyup="showMovie(this.value)" placeholder="Rechercher un film, une série..." autocomplete="off">
            <button type="submit" class="go-icon" title="Lancer la rechercher !"><i class="fas fa-search"></i></button>
            <div id="txtMovie" style="background-color: #171c24; color:aliceblue;"></div>
        </form>
    </nav>
</div>

<script src="../assets/js/font-awesome.js"></script>