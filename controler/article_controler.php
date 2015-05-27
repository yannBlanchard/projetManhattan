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
    
    $titre = htmlspecialchars($_POST['titrearticle']);
    $corps = htmlspecialchars($_POST['contenuarticle']);
    $avatar=$_FILES['imagearticle']['name'];
    $id_article = htmlspecialchars($_POST['cle']);
    $image= htmlspecialchars($_POST['image']);
    //image
    $imageArticle=$_FILES['imagearticle']['name'];
    $imageArticle_tmp=$_FILES['imagearticle']['tmp_name'];
    if(1){
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
            $imageArticle = "defaut_article.jpg";
        }
        if($titre != "" && $corps != "") {
            if (empty($_POST['cle'])) {
                    $articleClass = new article('', '', '', '', '', '');
                    $date = date("Y-m-d");
                    $articleClass->insertArticle($titre, $corps, $date, $imageArticle, $_SESSION['pseudo']);
                    header("Location: ../membre.php");
            }
            else{
                $articleClass = new article('', '', '', '', '', '');
                $articleClass->updateArticle($_POST['cle'],$titre, $corps,$imageArticle);
                 header("Location: ../membre.php");
            }

                
            }
            else{
                echo "code erreur1";
            }

        }
        else
            echo"grosse erreur";



}

