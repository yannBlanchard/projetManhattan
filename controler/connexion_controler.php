<?php

/**
 *
 * Created by PhpStorm.
 * User: austepha
 * Date: 20/04/2015
 * Time: 09:13
 *
 */

session_start();
include_once "../model/membre_modele.php";

if(isset($_POST['submit'])){
    $pseudo = addslashes($_POST['pseudo']);
    $mdp = addslashes($_POST['mdp']);
    if($pseudo != "" && $mdp != ""){
        $MEMBRE= new Membre('', '', '', '', '', '');
        $res = $MEMBRE->connexionMembre($pseudo, $mdp);
        if($res == 1){
            $_SESSION['pseudo'] = $pseudo;
            header('location:  ../index.php');
        }
        else{

        }
    }
    elseif($_POST['pseudo'] == ""){
        header("location : connexion.php?err=1000"); //erreur pseudo mot de passe invalide
    }
    elseif($_POST['mdp'] == ""){
        header("location : connexion.php?err=10001"); //erreur mot de passe invalide
    }
}

