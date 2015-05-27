<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 27/05/2015
 * Time: 17:17
 */
session_start();
require_once('../model/commentaire_modele.php');
if(isset($_POST['action'])){
    $classCommentaire=new commentaire('','','','','','');
    if($_POST['action']=="yes"){
        $classCommentaire->ValiderCommentaire($_POST['key']);
        echo $_POST['key'];
    }
    if($_POST['action']=="no"){
        $classCommentaire->deleteCommentaire($_POST['key']);
        echo $_POST['key'];
    }

}
else
    echo "Erreur";





?>