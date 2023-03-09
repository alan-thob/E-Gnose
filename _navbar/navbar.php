<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../assets/js/navbar.js" async></script>
</head>

<body>
<div id="header" class="wrapper">
    <nav>
        <input type="checkbox" id="show-search">
        <input type="checkbox" id="show-menu">
        <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
        <div class="content-navbar">
            <ul class="links">
                <li><a href="#">Accueil</a></li>
                <li>
                    <a href="#" class="desktop-link">Catégories</a>
                    <input type="checkbox" id="show-features">
                    <label for="show-features">Catégories</label>
                    <ul>
                        <li><a href="#">Catégories 1</a></li>
                        <li><a href="#">Catégories 2</a></li>
                        <li><a href="#">Catégories 3</a></li>
                        <li><a href="#">Catégories 4</a></li>
                    </ul>
                </li>
                <!--<li>
                    <a href="#" class="desktop-link">Catégories2 </a>
                    <input type="checkbox" id="show-services">
                    <label for="show-services">Catégories2</label>
                    <ul>
                        <li><a href="#">Catégories 1</a></li>
                        <li><a href="#">Catégories 2</a></li>
                        <li><a href="#">Catégories 3</a></li>
                        <li>
                            <a href="#" class="desktop-link">Sous-Catégories</a>
                            <input type="checkbox" id="show-items">
                            <label for="show-items">Sous-Catégories</label>
                            <ul>
                                <li><a href="#">Sub Menu 1</a></li>
                                <li><a href="#">Sub Menu 2</a></li>
                                <li><a href="#">Sub Menu 3</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>-->
                <li><a href="#">Ma wishlist</a></li>
                <!--<li><a href="https://e-gnose.sfait.fr/view/authentification.php">Mon compte</a></li>-->
            </ul>
            <div class="logo">
                <a href="https://e-gnose.sfait.fr/"><span>e</span>-Gnose</a>
            </div>
        </div>


        <label for="show-search" class="icons search-icon"><i class="fas fa-search"></i></label>
        <a class="icons2" href="https://e-gnose.sfait.fr/view/authentification.php"><i class="far fa-user-circle"></i></a>

        <form action="#" class="search-box">
            <input type="text" placeholder="Rechercher un film, un livre, un audio ..." required>
            <button type="submit" class="go-icon" title="Lancer la rechercher !"><i class="fas fa-search"></i></button>
        </form>
    </nav>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>
</html>
