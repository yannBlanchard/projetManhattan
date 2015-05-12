<?php
/**
 * Created by PhpStorm.
 * User: austepha
 * Date: 04/05/2015
 * Time: 11:22
 *
 * Controleur par rapport à la classe commentaire, qui permet d'avoir une notification quand on a un commentaire sur un article.
 */

include "../model/commentaire_modele.php";

if(isset($_GET['cle'])){

    $classCommentaire = new commentaire('','','','','','');
    $commentaires = $classCommentaire->recupererCommentairesParArticle($_GET['cle']);
    //print_r($commentaires);


}
else{
    //header('location: index.php?page=1');
}

if(isset($_POST['submitComment'])){
    echo "ok";
    if(isset($_SESSION['pseudo'])){

        $pseudo = $_SESSION['pseudo'];
    }
    else{
        $pseudo = "Visiteur";
    }
    echo $pseudo;
    if($corps != "") {
        echo "ok2";
        if($_GET['cle'] != "" && is_numeric($_GET['cle'])){

            $commentaires = $classCommentaire->insertCommentaire($pseudo, $corps, NOW(), $_GET['cle']);
            echo "ok";
        }
        else{
            echo "Code erreur";
        }
    }
    else{
        echo "Code erreur";
    }
}

