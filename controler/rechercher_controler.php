<?php
/**
 * Created by PhpStorm.
 * User: austepha
 * Date: 04/05/2015
 * Time: 09:28
 *
 * Contrôleur de la classe recherche par rapport au moteur de recherche.
 */



include "../model/article_modele.php";

if(isset($_POST['search'])&& empty ($_POST['search'])){
    $search = $_POST['search'];
    echo "L'article rechercher n'existe pas";
}
else{
    $RechercheArticle = RechercherArticle($titreArticle);
}