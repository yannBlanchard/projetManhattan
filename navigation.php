<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 13/04/2015
 * Time: 15:22
 */
if (isset($_SESSION))
    echo '
    <img src="img/Manhattans-blog.png" height="900px" width="100%">
<div id="navbar" class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item" id="Accueil" href="index.php#navbar">Accueil</a>
            <a class="blog-nav-item" id="About" href="about.php#navbar">A propos</a>
            <a class="blog-nav-item" id="Membre" href="membre.php#navbar">Espace Membre</a>
            <a class="blog-nav-item navbar-right btn-danger" href="model/deconnexion_modele.php"><i class="fa fa-power-off"></i></a>



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

?>
