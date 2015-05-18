<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 11/05/2015
 * Time: 12:09
 * Ce contrôleur vérifie que le téléchargement d'une image c'est bien éffectué.
 *
 */

function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
{

    //Test1: fichier correctement uploadé

    if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
    //Test2: taille limite

    if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
    //Test3: extension

    $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
    if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
    //Déplacement

    return move_uploaded_file($_FILES[$index]['tmp_name'],$destination."/".$_FILES[$index]['name']);
}

//$upload1 = upload('imagearticle','../../img/articles',$_POST['MAX_FILE_SIZE'], array('png','gif','jpg','jpeg') );

?>