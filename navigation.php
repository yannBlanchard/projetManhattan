<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 13/04/2015
 * Time: 15:22
 * Cette vue permet d'avoir le visuel de la barre de navigation.
 * Elle est composée de plusieurs onglet (accueil, membre, à propos, etc...).
 */
if (isset($_SESSION['pseudo'])&&($_SESSION['pseudo']!= ""))
    echo '
    <img src="img/Manhattans-blog.png" height="900px" width="100%">
<div id="navbar" class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item" id="Accueil" href="index.php#navbar">Accueil</a>
            <a class="blog-nav-item" id="About" href="about.php#navbar">A propos</a>
            <a class="blog-nav-item" id="Membre" href="membre.php#navbar">Espace Membre</a>
            <a class="blog-nav-item navbar-right btn-danger" href="controler/deconnexion_controler.php"><i class="fa fa-power-off"></i></a>



        </nav>
    </div>
</div>';

else
    echo '<img src="img/Manhattans-blog.png" height="900px" width="100%">
<div id="navbar" class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item" id="Accueil" href="index.php#navbar">Accueil</a>

            <a class="blog-nav-item" id="About" href="about.php#navbar">A propos</a>

            <a class="blog-nav-item navbar-right" href="connexion.php#navbar">Connexion</a>
            <a class="blog-nav-item navbar-right" href="inscription.php#navbar">Inscrire</a>


        </nav>
    </div>
</div>';

require_once('controler/error_codes_controler.php');
?>
