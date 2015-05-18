<?php
/**
 * Created by PhpStorm.
 * User: yablanch
 * Date: 18/05/2015
 * Time: 11:54
 */
date_default_timezone_set("Europe/Paris");
require_once("../model/commentaire_modele.php");
if(isset($_POST['submitComment'])){
    $corps = htmlspecialchars($_POST['addComment']);
    $cle = htmlspecialchars($_POST['cle']);
    if(isset($_SESSION['pseudo'])){

        $pseudo = $_SESSION['pseudo'];
    }
    else{
        $pseudo = "Inconnu";
    }
    if($corps != "") {
        if($cle != "" && is_numeric($cle)){
            $date = date("Y-m-d");
            $classCommentaire = new commentaire('','','','','','');
            $classCommentaire->insertCommentaire($pseudo, $corps, $date, $cle);
            header("Refresh: 0;URL=../single.php");
        }
        else{
            echo "Code erreur";
        }
    }
    else{
        echo "Code erreur : corps message vide";
    }
}
else{
    echo "code erreur";
}