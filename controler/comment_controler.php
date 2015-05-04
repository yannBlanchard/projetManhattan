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

if($test >= 1){
    while($resultat=mysql_fetch_array($req)){
        if($resultat['etat']==0){
            $titreCommentaire=$resultat['titreCommentaire'];
        }
        else{
            $TitreCommentaire=$resultat['titreCommentaire'];
            echo 'Vous etes desormais amie avec '.$pseudoExp.'.<br/>';
        }
    }
}
else{
    header("location : connexion.php?err=90"); //erreur il n'y a pas de commentaire
}

if($test>=1){
    $req=mysql_query($mysql);
    while($resultat=mysql_fetch_array($req)){
        header('location:  ../index.php'); //redirige vers le commentaire, a changer l'adresse!
    }

    $mysql="UPDATE commentaire SET etat='1' WHERE titreCommentaire"; // problème
    $req=mysql_query($mysql);

}