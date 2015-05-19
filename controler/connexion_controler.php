<?php

/**
 *
 * Created by PhpStorm.
 * User: Yann
 * Date: 20/04/2015
 * Time: 09:13
 * Ce contrôleur sert à la connexion d'un membre.
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
            header("Location: ../connexion.php?err=1008#navbar"); //erreur pseudo ou mdp invalide
        }
    }
    elseif($_POST['pseudo'] == ""){
        header("Location: ../connexion.php?err=1005#navbar"); //erreur pseudo mot de passe vide
    }
    elseif($_POST['mdp'] == ""){
        header("Location: ../connexion.php?err=1005#navbar"); //erreur mot de passe vide
    }
}

