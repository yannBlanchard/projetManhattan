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
    else {
        //$article = recupererArticle((1*$_GET['page'])-1,20*$_GET['page']);

        /*while($row = $req->fetch()){

        }*/


        /*foreach ($article as $cle => $infosArticle) {
            /*$articles[$cle]['titreArticle'] = htmlspecialchars($infosArticle['titreArticle']);
            $articles[$cle]['corpsArticle'] = htmlspecialchars($infosArticle['corpsArticle']);
            $articles[$cle]['date_Aticle'] = htmlspecialchars($infosArticle['date_Aticle']);
            $articles[$cle]['imageArticle'] = htmlspecialchars($infosArticle['imageArticle']);
            $articles[$cle]['Mem_pseudo'] = htmlspecialchars($infosArticle['Mem_pseudo']);

        }*/
    }
}
else{
    header('location: index.php?page=1');
}
