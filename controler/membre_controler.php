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


$MLK = new Membre($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["pseudo"], $_POST["mdp"],$_POST["droit"]);
$MLK->connexionMembre($_POST["pseudo"], $_POST["mdp"]);
header('location:  ../index.php');