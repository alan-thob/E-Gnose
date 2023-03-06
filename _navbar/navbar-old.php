<!doctype html>
<html lang="fr">
<head>
    <link href="../assets/css/navbar-old.css" rel="stylesheet">
</head>
<body>

<header id="header">
    <nav id="navbar" class="navbar">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggler" data-toggle="open-navbar1">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <a href="#">
                    <h4><span>e</span>-Gnose</h4>
                </a>
            </div>

            <div class="navbar-menu" id="open-navbar1">
                <ul class="navbar-nav">
                    <li class="active"><a href="#">Accueil</a></li>
                    <li class="navbar-dropdown">
                        <a href="#" class="dropdown-toggler" data-dropdown="my-dropdown-id">
                            Catégories <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown" id="my-dropdown-id">
                            <li><a href="#">Cat 1</a></li>
                            <li><a href="#">Cat 2</a></li>
                            <li class="separator"></li>
                            <li><a href="#">Cat 3</a></li>
                            <li class="separator"></li>
                            <li><a href="#">Cat 4</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Ma wishlist</a></li>
                    <li><a href="#">Se connecter</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script src="../assets/js/navbar.js" async></script>
<script>
    (function () {
        "use strict";

        /**
         * Easy selector helper function
         */
        const select = (el, all = false) => {
            el = el.trim()
            if (all) {
                return [...document.querySelectorAll(el)]
            } else {
                return document.querySelector(el)
            }
        }

        /**
         * Easy on scroll event listener
         */
        const onscroll = (el, listener) => {
            el.addEventListener('scroll', listener)
        }

        /**
         * Toggle .header-scrolled class to #header when page is scrolled
         */
        let selectHeader = select('#header')
        if (selectHeader) {
            const headerScrolled = () => {
                if (window.scrollY > 100) {
                    selectHeader.classList.add('navbar-scrolled')
                } else {
                    selectHeader.classList.remove('navbar-scrolled')
                }
            }
            window.addEventListener('load', headerScrolled)
            onscroll(document, headerScrolled)
        }

    })()
</script>