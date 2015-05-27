<?php
/**
 * Created by PhpStorm.
 * User: yablanch
 * Date: 18/05/2015
 * Time: 11:54
 */
session_start();
require_once("../model/commentaire_modele.php");
date_default_timezone_set("Europe/Paris");

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
            header("Location: ../single.php?cle=".$cle);
        }
        else{
            header("Location: ../single.php?err=1013");
        }
    }
    else{
        header("Location: ../single.php?err=1005");
    }
}
else{
    header("Location: ../single.php?err=1002");
}