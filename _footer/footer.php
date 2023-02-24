<!doctype html>
<html lang="fr">
<head>
    <link href="../assets/css/footer.css" rel="stylesheet">
</head>
<body>

<footer>
    <div class="footer">
        <div class="footer__subscribe">
            <h2>Retrouvez vos contenus préférés où vous voulez, quand vous voulez, en illimité sur <span>e</span>-Gnose.</h2>
            <a class="subscribe__btn" href="#">Je m'abonne !</a>
        </div>
    </div>

    <div class="credits" id="copyright">
        <p class="text-center">&copy; #DATE# e-Gnose. Tous droits réservés. <a href="#">Conditions d'utilisation et Politique de confidentialité</a> <a href="#">Avertissement relatif aux cookies</a><br>
        Fait avec ♡ par Alan THOB et Kyllian DIOCHON</p>
    </div>
</footer>

<script>document.getElementById(`copyright`).innerHTML = document.getElementById(`copyright`).innerHTML.replace(`#DATE#`, new Date().getFullYear());</script>

</body>
</html>
