<?php
/**
 * Created by PhpStorm.
 * User: yablanch
 * Date: 11/05/2015
 * Time: 11:04
 */
include_once('model/membre_modele.php');


if(isset($_POST['Submit'])){
    $nom = addslashes($_POST['nom']);
    $prenom = addslashes($_POST['prenom']);
    $email = addslashes($_POST['email']);
    $pseudo = addslashes($_POST['pseudo']);
    $mdp = addslashes($_POST['mdp']);
    $confirm = addslashes($_POST['confirm']);
    $avatar = addslashes($_POST['avatar']);


    if($nom!="" && $prenom != "" && $email != "" && $pseudo != "" && $mdp != "" && $confirm != "" && $mdp == $confirm){
        $classMembre = new article('','','','','','');
        $membre = $classMembre->InscriptionUti ($nom, $prenom, $email,$pseudo, 0, 'default.jpg', $mdp);

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

}