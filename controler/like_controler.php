<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 20/04/2015
 * Time: 10:02
 * Ce contrôleur prend en compte un "j'aime" sur un article.
 *
 */

session_start();
require_once("../model/likes_modele.php");
require_once("../model/Dislike_modele.php");

if(isset($_POST['type'])){
    if($_POST['type']=="up"){
        $LIKES= new Likes($_POST['pseudo'],$_POST['cle']);
        $LIKES->insertLikes();
        echo "up";
    }
    else if($_POST['type']=="down"){
        $LIKES= new Dislike($_POST['pseudo'],$_POST['cle']);
        $LIKES->insertDislikes();
        echo "down";
    }
    else
        echo "erreur";
}
else
       echo "errorpost";

