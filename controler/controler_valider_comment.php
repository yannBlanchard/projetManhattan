<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 27/05/2015
 * Time: 17:17
 */

require_once('model/commentaire_modele.php')
If(isset($_POST['action'])){
    $classCommentaire=new commentaire('','','','','','');
    If($_POST['action']=="yes"){
        $classCommentaire->ValiderCommentaire($_POST['key']);
        echo "FAIT";
    }
    If($_POST['action']=="no"){
        $classCommentaire->deleteCommentaire($_POST['key']);
    }
    else
        echo "Erreur";
}
else
    echo "Erreur";





?>