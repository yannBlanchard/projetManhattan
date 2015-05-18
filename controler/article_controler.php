<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 18/04/2015
 * Time: 16:38
 */

include_once "../model/article_modele.php";
/*$articleClass = new article('','','','','');
$articles = $articleClass->recupererArticle(0,20);
foreach($article as $cle => $article)
{
    $articles[$cle]['titre'] = htmlspecialchars($billet['titre']);
    $articles[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
}*/
echo "ok";
print_r($_POST);
if(isset($_POST['submitArticle'])){
    echo "ok1";
    $titre = htmlspecialchars($_POST['titrearticle']);
    $corps = htmlspecialchars($_POST['contenuarticle']);
    $avatar=$_FILES['imagearticle']['name'];
     //image
    echo "ok";
    $imageArticle=$_FILES['imagearticle']['name'];
    $imageArticle_tmp=$_FILES['imagearticle']['tmp_name'];
    if(!empty($imageArticle)){
        $fichier_ext=strtolower(end(explode('.',$imageArticle)));
        if(in_array($fichier_ext,array('jpg','jpeg','png'))){
            move_uploaded_file($_FILES['imagearticle']['tmp_name'],'img/'.$_FILES['imagearticle']['name']);

            if($titre != "" && $corps != ""){
                $articleClass = new article('','','','','');

                $articleClass->insertArticle($titre,$corps,NOW(),$_FILES['imagearticle']['name'],$_SESSION['pseudo']);
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
