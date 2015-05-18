<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 16/04/2015
 * Time: 22:00
 * Ce contrôleur réalise des vérifications quand il y a une insertion d'un membre dans la base de données.
 * Il utilise les fonctions de la classe membre.
 *
 */

session_start();
include "../model/membre_modele.php";
$Syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
if (preg_match($Syntaxe, $email)) {
    if (!(empty($_POST))) {
        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['pseudo']) || empty($_POST['mdp']) || empty($_POST['droit'])) {
            header('Location : inscription.php?err=56 '); // retourne une erreur, si tous les champs ne sont pas rempli
        }
        else {
            $VerifExistePseudo = VerificationExistancePseudo($pseudo);
            if($VerifExistePseudo == 0) {
                $verificationExistanceMail = VerificationExistanceEmail($pseudo);
                if ($verificationExistanceMail == 0) {
                    $MEMBRE = new Membre($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["pseudo"], $_POST["mdp"], $_POST["droit"]);
                    $MEMBRE->InscriptionUti($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["pseudo"], $_POST['droit'], $_POST['avatar'], $_POST["mdp"]);
                    header('Location : membre.php '); // dans le cas ou tous est bien rempli.
                }
                else{
                    header('Location : inscription.php?err=58');
                }
            }
            else{
                header('Location : inscription.php?err=57');
            }
        }
    }
}
else {
    header('Location : inscription.php?err=1003 '); // erreur syntaxe email incorrect
}








