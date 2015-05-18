<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 12/05/2015
 * Time: 09:35
 * Ce contrôleur permet d'afficher un article dans sa totalité.
 * On utilise la fonction "recupererArticleParCle" de la classe article.
 * Dans le cas ou il y a un disfonctionnement, il affiche une erreur.
 */
include_once('model/article_modele.php');

if(isset($_GET['cle'])){

    $classArticle = new article('','','','','');
    $article = $classArticle->recupererArticleParCle($_GET['cle']);
    //print_r($article);

    if(empty($article)){
        header("location : index.php?err=1003"); //erreur pas d'article
    }

}
else{
    header('location: index.php?page=1');
}
?>