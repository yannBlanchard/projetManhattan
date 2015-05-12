<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 18/04/2015
 * Time: 16:38
 */

include_once "../model/article_modele.php";
$articles = recupererArticle(20);
foreach($article as $cle => $article)
{
    $articles[$cle]['titre'] = htmlspecialchars($billet['titre']);
    $articles[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
}

if(isset($_POST['submitArticle'])){
    $titre = htmlspecialchars($_POST['titrearticle']);
    $corps = htmlspecialchars($_POST['corps']);
    $avatar=$_FILES['avatar']['name'];
     //image

    $imageArticle=$_FILES['imageArticle']['name'];
    $imageArticle_tmp=$_FILES['imageArticle']['tmp_name'];
    if(!empty($imageArticle)){
        $fichier_ext=strtolower(end(explode('.',$imageArticle)));
        if(in_array($fichier_ext,array('jpg','jpeg','png'))){
            move_uploaded_file($_FILES['imageArticle']['tmp_name'],'img/'.$_FILES['imageArticle']['name']);

            if($titre != "" && $corps != ""){
                $articleClass = new article('','','','','');
                $articleClass->insertArticle($titre,$corps,NOW(),$_FILES['imageArticle']['name'],$_SESSION['pseudo']);
            }
            else{
                echo "code erreur";
            }

        }
        else{
            echo "Format image non supporté.";
            echo "Format supporté : jpg,jpeg,png";
        }
    }



}
