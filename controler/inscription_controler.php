<?php
/**
 * Created by PhpStorm.
 * User: yablanch
 * Date: 11/05/2015
 * Time: 11:04
 */
include_once('../model/membre_modele.php');


if(isset($_POST['submit'])){
    $nom = addslashes($_POST['nom']);
    $prenom = addslashes($_POST['prenom']);
    $email = addslashes($_POST['email']);
    $pseudo = addslashes($_POST['pseudo']);
    $mdp = addslashes($_POST['mdp']);
    $confirm = addslashes($_POST['confirm']);


    if($nom!="" && $prenom != "" && $email != "" && $pseudo != "" && $mdp != "" && $confirm != "" && $mdp == $confirm){
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
            header("location : inscription.php?err=1004"); //erreur pb @mail
        }


    }
    else {
        if ($nom == "") {
            echo "code erreur";
        }
        if ($prenom == "") {
            echo "code erreur";
        }
        if ($email == "") {
            echo "code erreur";
        }
        if ($pseudo == "") {
            echo "code erreur";
        }
        if ($mdp == "") {
            echo "code erreur";
        }
        if ($confirm == "") {
            echo "code erreur";
        }
        if($mdp != $confirm){
            echo "code erreur";
        }
    }
}
else{
    echo "Code erreur";
}