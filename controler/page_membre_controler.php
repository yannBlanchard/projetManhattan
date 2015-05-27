<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 18/05/2015
 * Time: 09:21
 * Ce contrôleur permet d'afficher les articles sur la page d'un membre.
 */

require_once('model/article_modele.php');
require_once('model/visite_modele.php');
require_once('model/membre_modele.php');
require_once('model/likes_modele.php');
require_once('model/Dislike_modele.php');



if(1){
    if(isset($_POST['cledelete'])){
        $art=new article('', '', '', '', '', '');
        $art->deleteArticle($_POST['cledelete']);    
    }    
    $classArticle = new article('','','','','','');
    $articles = $classArticle->recupererArticleParAuteur($_SESSION['pseudo']);

    $classAuteur=new Membre('','','','','','');
    $visiteauteur=$classAuteur->Get_Visite_Par_Auteur($_SESSION['pseudo']);
    $commentaireauteur=$classAuteur->CountCommentairesParAuteur($_SESSION['pseudo']);
    $imagemembre=$classAuteur->Get_Img_By_Auteur($_SESSION['pseudo']);
    $nbarticles=$classAuteur->Count_Article_By_Auteur($_SESSION['pseudo']);

    $likeauteur=$classAuteur->Get_Like_Par_Auteur($_SESSION['pseudo']);
    $dislikeauteur=$classAuteur->Get_Dislike_Par_Auteur($_SESSION['pseudo']);
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
    header('location: index.php');
}
