<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 12/05/2015
 * Time: 13:49
 * Ce contrôleur sert à la déconnexion d'un membre.
 *
 */

session_start();
session_destroy();
header('Location: ../index.php');
exit;

?>