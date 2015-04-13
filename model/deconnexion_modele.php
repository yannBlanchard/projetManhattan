<?php
/**
 * Created by PhpStorm.
 * User: austepha
 * Date: 13/04/2015
 * Time: 11:22
 *
 * Déconnexion à la base de données.
 * Quand un utilisateur se déconnecte de son compte.
 */

session_start();
session_destroy();
header(' location:../index.php');
exit;

?>