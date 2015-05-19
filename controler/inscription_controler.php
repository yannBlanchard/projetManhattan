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


if(isset($_POST['submit'])){
    $nom = addslashes($_POST['nom']);
    $prenom = addslashes($_POST['prenom']);
    $email = addslashes($_POST['email']);
    $pseudo = addslashes($_POST['pseudo']);
    $mdp = addslashes($_POST['mdp']);
    $confirm = addslashes($_POST['confirm']);
    $captcha=addslashes($_POST['captcha']);

    if($nom!="" && $prenom != "" && $email != "" && $pseudo != "" && $mdp != "" && $confirm != "" && $mdp == $confirm && $captcha== "Paris"){
        $classMembre = new Membre('','','','','','');
        $verif = $classMembre->VerifierAdresseMail($email);
        if($verif == true) {
            $verif = $classMembre->VerificationExistanceEmail($email);
            if($verif == true) {
                $verif = $classMembre->VerificationExistancePseudo($pseudo);
                if($verif == true) {
                    $membre = $classMembre->InscriptionUti($nom, $prenom, $email, $pseudo, 0, 'default.jpg', $mdp);
                    header("Refresh: 0; URL=../index.php");
                }
                else{
                    echo "code erreur";
                }
            }
            else{
                echo "code erreur";
            }
        }
        else{
            header("location : inscription.php?err=1004"); //erreur pb @mail existant
        }


    }
    else {
        if ($nom == "") {
            header("location : inscription.php?err=1005"); //erreur remplissage champs
        }
        if ($prenom == "") {
            header("location : inscription.php?err=1005"); //erreur remplissage champs
        }
        if ($email == "") {
            header("location : inscription.php?err=1005"); //erreur remplissage champs
        }
        if ($pseudo == "") {
            header("location : inscription.php?err=1005"); //erreur remplissage champs
        }
        if ($mdp == "") {
            header("location : inscription.php?err=1005"); //erreur remplissage champs
        }
        if ($confirm == "") {
            header("location : inscription.php?err=1005"); //erreur remplissage champs
        }
        if($mdp != $confirm){
            header("location : inscription.php?err=1006"); //erreur mots de passe differents
        }
        if($captcha != "Paris"){
            header("location : inscription.php?err=1007"); //erreur captcha faux
        }
    }
}
else{
    echo "Code erreur";
}