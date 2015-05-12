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

    $classCommentaire = new commentaire('','','','','');
    $commentaires = $classCommentaire->recupererCommentairesParArticle($_GET['cle']);
    print_r($commentaires);


}
else{
    header('location: index.php?page=1');
}