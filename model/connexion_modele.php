<?php
/**
 * Created by PhpStorm.
 * User: austepha
 * Date: 13/04/2015
 * Time: 11:10
 *
 * Connexion à la base de données manhattan.
 */



try {
    $bdd = new PDO('mysql:hostlocalhost;dbname=manhattan;charset=utf8', 'root', 'root');
    }
catch (PDOException $e) {
    print "Erreur dans la base de données ! :" . $e->getMessage() . "<br/>";
    die();
}

?>