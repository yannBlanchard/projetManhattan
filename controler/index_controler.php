<?php
/**
 * Created by PhpStorm.
 * User: yablanch
 * Date: 20/04/2015
 * Time: 12:14
 */
include_once('model/article_modele.php');

if(isset($_GET['page'])){

    $classArticle = new article('','','','','');
    $article = $classArticle->recupererArticle(0,10);
    //$article = recupererArticle((1*$_GET['page'])-1,20*$_GET['page']);
    foreach($article as $cle => $infosArticle){
        $articles[$cle]['titreArticle'] = htmlspecialchars($billet['titreArticle']);
        $articles[$cle]['corpsArticle'] = htmlspecialchars($billet['corpsArticle']);
        $articles[$cle]['date_Aticle'] = htmlspecialchars($billet['date_Aticle']);
        $articles[$cle]['imageArticle'] = htmlspecialchars($billet['imageArticle']);
        $articles[$cle]['Mem_pseudo'] = htmlspecialchars($billet['Mem_pseudo']);
    }
}
else{
    header('location: index.php?page=1');
}
