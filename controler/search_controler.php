<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 20/04/2015
 * Time: 12:14
 * Ce contrôleur permet d'éffectuer une recherche dans les articles, en fonction du titre.
 * POur cela, on appel la fonction "recupererArticleParTitre".
 */
require_once('model/article_modele.php');

if(isset($_GET['search'])){

    $classArticle = new article('','','','','','');
    $articles = $classArticle->recupererArticleParTitre($_GET['search']);

    //print_r($articles);
    if(empty($articles)){
        header("location : search.php?err=1012"); //erreur pas d'article
    }

}
else{
    if(isset($_GET['archive'])){
        $classArticle = new article('','','','','','');
        $articles = $classArticle->recupererArticleParDate($_GET['archive']);

        //print_r($articles);
        if(empty($articles)){
            header("location : search.php?err=1012"); //erreur pas d'article
        }
    }
    else
        header('location: index.php?page=1');
}
