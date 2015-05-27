<?php
/**
 * Created by PhpStorm.
 * User: yablanch
 * Date: 11/05/2015
 * Time: 11:04
 * Ce contrôleur prend en compte l'inscription d'un utilisateur, pour devenir membre.
 * Il vérifie que l'adresse mail, l'existance de l'adresse mail, vérifie le pseudo.
 * Pour cela, on utilise les fonctions "VerifierAdresseMail", "VerificationExistanceEmail", "VerificationExistancePseudo" et "InscriptionUti"
 * de la classe membre.
 *
 */
include_once('../model/membre_modele.php');
session_start();

if(isset($_POST['submit'])){
    $nom = addslashes($_POST['nom']);
    $prenom = addslashes($_POST['prenom']);
    $email = addslashes($_POST['email']);
    $pseudo = addslashes($_POST['pseudo']);
    $mdp = addslashes($_POST['mdp']);
    $confirm = addslashes($_POST['confirm']);
    $captcha=addslashes($_POST['captcha']);

    if($nom!="" && $prenom != "" && $email != "" && $pseudo != "" && $mdp != "" && $confirm != "" && $mdp == $confirm && $captcha==$_SESSION['captcha']){
        $classMembre = new Membre('','','','','','');
        $verif = $classMembre->VerifierAdresseMail($email);
        if($verif == true) {
            $verif = $classMembre->VerificationExistanceEmail($email);
            if($verif==0) {
                $verif = $classMembre->VerificationExistancePseudo($pseudo);
                if(!$verif) {
                    $membre = $classMembre->InscriptionUti($nom, $prenom, $email, $pseudo, 0, 'default.jpg', $mdp);
                    header("Location: ../index.php#navbar?page=1&success=1");
                }
                else{
                    header("Location: ../inscription.php?err=1011");
                }
            }
            else{
                header("Location: ../inscription.php?err=1003");
            }
        }
        else{
            header("Location: ../inscription.php?err=1004"); //erreur pb @mail existant
        }


    }
    else {
        if ($nom == "") {
            header("Location: ../inscription.php?err=1005"); //erreur remplissage champs
        }
        if ($prenom == "") {
            header("Location: ../inscription.php?err=1005"); //erreur remplissage champs
        }
        if ($email == "") {
            header("Location: ../inscription.php?err=1005"); //erreur remplissage champs
        }
        if ($pseudo == "") {
            header("Location: ../inscription.php?err=1005"); //erreur remplissage champs
        }
        if ($mdp == "") {
            header("Location: ../inscription.php?err=1005"); //erreur remplissage champs
        }
        if ($confirm == "") {
            header("Location: ../inscription.php?err=1005"); //erreur remplissage champs
        }
        if($mdp != $confirm){
            header("Location: ../inscription.php?err=1006"); //erreur mots de passe differents
        }
        if($captcha==$_SESSION['captcha']){
            header("Location: ../inscription.php?err=1007"); //erreur captcha faux
        }
    }
}
else{
     header("Location: ../inscription.php?err=1005"); //erreur remplissage champs

}