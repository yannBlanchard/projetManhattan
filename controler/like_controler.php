<?php
/**
 * Created by PhpStorm.
 * User: austepha
 * Date: 20/04/2015
 * Time: 10:02
 */

session_start();
include_once "../model/likes_modele.php";

$LIKES= new Likes($_POST["idLikes"], $_POST["pseudo"], $_POST["Art_id_article"]);
$LIKES->insertLikes();
