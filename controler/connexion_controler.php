<?php

/**
 *
 * Created by PhpStorm.
 * User: Yann
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
        $membre= new Membre('', '', '', '', '', '');


        $res = $membre->connexionMembre($pseudo, $mdp);
        if($res == 1){
            $_SESSION['pseudo'] = $pseudo;

            header('location:  ../index.php');
        }
        else{
            header("location : connexion.php?err=1002"); //erreur pseudo ou mdp invalide
        }
    }
    elseif($_POST['pseudo'] == ""){
        header("location : connexion.php?err=1000"); //erreur pseudo mot de passe vide
    }
    elseif($_POST['mdp'] == ""){
        header("location : connexion.php?err=1001"); //erreur mot de passe vide
    }
}

