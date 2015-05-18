<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 18/05/2015
 * Time: 10:54
 * Ce contrôleur prend en compte le changement de la photo (avatar).
 */

session_start();
include_once "../model/membre_modele.php";
date_default_timezone_set("Europe/Paris");
/*$articleClass = new article('','','','','');
$articles = $articleClass->recupererArticle(0,20);
foreach($article as $cle => $article)
{
    $articles[$cle]['titre'] = htmlspecialchars($billet['titre']);
    $articles[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
}*/

if(isset($_POST)){


    $avatar=$_FILES['newavatar']['name'];
    //image
    $image=$_FILES['newavatar']['name'];
    $image_tmp=$_FILES['newavatar']['tmp_name'];
    if(!empty($image)){
        //$fichier_ext=strtolower(end(explode('.',$imageArticle)));
        //On vérifie l'extension
        $fichier_ext = substr(strrchr($image, '.'), 1);
        if(in_array($fichier_ext,array('jpg','jpeg','png'))){
            move_uploaded_file($_FILES['newavatar']['tmp_name'],'../img/'.$_FILES['newavatar']['name']);
            rename('../img/'.$_FILES['newavatar']['name'], '../img/'.$_SESSION['pseudo'].substr($_FILES['newavatar']['name'],-4,4));
            if($image != "" ){
                $membreClass = new membre('','','','','','','');

                $membreClass->updateAvatar($_SESSION['pseudo'].substr($_FILES['newavatar']['name'],-4,4),$_SESSION['pseudo']);
                header ("location: ../membre.php");
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