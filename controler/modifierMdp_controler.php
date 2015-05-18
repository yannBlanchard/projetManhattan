<?php
/**
 * Created by PhpStorm.
 * User: austepha
 * Date: 18/05/2015
 * Time: 09:25
 *
 * Ce contrôleur permet de modifier le mot de passe dans la base de données.
 */

include_once('../model/membre_modele.php');

// Si l'utilisateur veut modifier son mot de passe (oublier)
if (!empty($mdp)) {

    $test = mdp($_SESSION['pseudo'], $mdp);

    if (true === $test) {

        // Le changement a été réalisé.
       echo "Le changement du mot de passe a été réalisé avec succès !";


    } else {

        // Dans le cas ou il rencontre une erreur.
        header('Location : inscription.php?err=400');
    }
}