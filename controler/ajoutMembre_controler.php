<?php
/**
 * Created by PhpStorm.
 * User: austepha
 * Date: 20/04/2015
 * Time: 09:20
 */

session_start();
include "../model/membre_modele.php";
$Syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
if (preg_match($Syntaxe, $email)) {
    return true;
} else {
    return false;
}

if(!(empty($_POST))){
    if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['pseudo']) || empty($_POST['mdp']) || empty($_POST['droit']))
    {
       header ('Location : inscription.php.err=56 '); // retourne une erreur, si tous les champs ne sont pas rempli
    }
    else{
        header ('Location : membre.php '); // dans le cas ou tous est bien rempli.
    }
}

$MEMBRE= new Membre($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["pseudo"], $_POST["mdp"],$_POST["droit"]);
$MEMBRE->InscriptionUti($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["pseudo"], $_POST["mdp"], $_POST["mdp2"]);
