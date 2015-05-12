<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 12/05/2015
 * Time: 09:35
 */
include_once('model/article_modele.php');

if(isset($_GET['cle'])){

    $classArticle = new article('','','','','');
    $article = $classArticle->recupererArticleParCle($_GET['cle']);
    //print_r($article);
    include_once('comment_controler.php');
    if(empty($article)){
        header("location : index.php?err=1003"); //erreur pas d'article
    }

}
else{
    header('location: index.php?page=1');
}
?>