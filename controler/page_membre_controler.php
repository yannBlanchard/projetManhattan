<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 18/05/2015
 * Time: 09:21
 */

include_once('model/article_modele.php');

if(isset($_GET['page'])){

    $classArticle = new article('','','','','','');
    $articles = $classArticle->recupererArticleParAuteur($_SESSION['pseudo']);

    //print_r($articles);
    if(empty($articles)){
        header("location : membre.php?err=1003"); //erreur pas d'article
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
    header('location: membre.php');
}
