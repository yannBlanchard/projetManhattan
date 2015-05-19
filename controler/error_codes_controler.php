<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 19/05/2015
 * Time: 13:16
 */

if(isset($_GET['err'])){
    $message_error="Arrete de trafiquer les codes erreurs vilain!";

    if($_GET['err']==1002)
        $message_error="ERROR";
    if($_GET['err']==1003)
        $message_error="Syntaxe incorrecte";
    if($_GET['err']==1004)
        $message_error="Mail déjà utilisé";
    if($_GET['err']==1005)
        $message_error="Remplissez bien tout les champs";
    if($_GET['err']==1006)
        $message_error="Mots de passes saisies differents";
    if($_GET['err']==1007)
        $message_error="Mauvais captcha";
    if($_GET['err']==1008)
        $message_error="Pseudo/Mot de passe invalide";
    if($_GET['err']==1009)
        $message_error="Le Chargement de l'image a échoué";
    if($_GET['err']==1010)
        $message_error="Format image non supporté. Format supporte : jpg,jpeg,png";
    if($_GET['err']==1011)
        $message_error="Pseudo deja existant";
    if($_GET['err']==1012)
        $message_error="Pas d'article trouve";
    if($_GET['err']==1013)
        $message_error="Cle d'article invalide";
    if($_GET['err']==1010)
        $message_error="Format image non supporté. Format supporte : jpg,jpeg,png";
    if($_GET['err']==1010)
        $message_error="Format image non supporté. Format supporte : jpg,jpeg,png";

    echo '<div class="alert alert-danger" role="alert" style="text-align: center;"><h3 class="alert-danger">Erreur : '.$message_error.'</h3></div>';
}



?>