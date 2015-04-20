<?php
/**
 * Created by PhpStorm.
 * User: austepha
 * Date: 20/04/2015
 * Time: 09:20
 */

session_start();
include "../model/membre_modele.php";
$MEMBRE= new Membre($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["pseudo"], $_POST["mdp"],$_POST["droit"]);
$MEMBRE->InscriptionUti($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["pseudo"], $_POST["mdp"], $_POST["mdp2"]);
