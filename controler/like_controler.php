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
include_once "../model/likes_modele.php";
include_once "../model/Dislikes_modele.php";

if(isset($_POST['type'])){
    if($_POST['type']="up"){
        $LIKES= new Likes('', $_SESSION["pseudo"], $_POST["Art_id_article"]);
        $LIKES->insertLikes();
    }
    if($_POST['type']="down"){

    }



}


