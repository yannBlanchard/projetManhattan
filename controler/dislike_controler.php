<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 20/04/2015
 * Time: 10:02
 * Ce contrôleur prend en compte un "j'aime pas" sur un article.
 *
 */

session_start();
include_once "../model/Dislike_modele.php";

$DISLIKES= new Dislike ('', $_SESSION["pseudo"], $_POST["Art_id_article"]);
$DISLIKES->insertDislike();