<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 18/04/2015
 * Time: 16:38
 * Ce contôleur réalise des vérifications lors de l'écriture d'un article.
 *
 */
session_start();
include_once "../model/article_modele.php";
date_default_timezone_set("Europe/Paris");
/*$articleClass = new article('','','','','');
$articles = $articleClass->recupererArticle(0,20);
foreach($article as $cle => $article)
{
    $articles[$cle]['titre'] = htmlspecialchars($billet['titre']);
    $articles[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
}*/

if(isset($_POST['submitArticle'])){
    echo "ok1";
    $titre = htmlspecialchars($_POST['titrearticle']);
    $corps = htmlspecialchars($_POST['contenuarticle']);
    $avatar=$_FILES['imagearticle']['name'];
    $id_article = htmlspecialchars($_POST['cle']);
    $image= htmlspecialchars($_POST['image']);
    //image
    $imageArticle=$_FILES['imagearticle']['name'];
    $imageArticle_tmp=$_FILES['imagearticle']['tmp_name'];
    if(!empty($imageArticle) || $image != ""){
        //$fichier_ext=strtolower(end(explode('.',$imageArticle)));
        //On vérifie l'extension
        if(!empty($imageArticle)) {
            $fichier_ext = substr(strrchr($imageArticle, '.'), 1);
            if (in_array($fichier_ext, array('jpg', 'jpeg', 'png'))) {
                move_uploaded_file($_FILES['imagearticle']['tmp_name'], '../img/' . $_FILES['imagearticle']['name']);
            }
            else {
                echo "Format image non supporté.";
                echo "Format supporté : jpg,jpeg,png";
            }
        }
        else {
            $imageArticle = $image;
        }
            if($titre != "" && $corps != "") {
                if ($_POST['cle'] == "") {
                    $articleClass = new article('', '', '', '', '', '');
                    $date = date("Y-m-d");
                    $articleClass->insertArticle($titre, $corps, $date, $imageArticle, $_SESSION['pseudo']);
                }
                else{
                    $articleClass = new article('', '', '', '', '', '');
                    $articleClass->updateArticle($id_article,$titre, $corps,$imageArticle);
                }
                header("Refresh: 0;URL=../newarticle.php");
            }
            else{
                echo "code erreur";
            }

        }



}

