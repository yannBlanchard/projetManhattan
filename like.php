<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 26/05/2015
 * Time: 11:09
 */
require_once('model/likes_modele.php');
require_once('model/Dislike_modele.php');
if (isset($_SESSION['pseudo'])) {
    $likes=new Likes($_SESSION['pseudo'],$_GET['cle']);
    $dislikes=new Dislike($_SESSION['pseudo'],$_GET['cle']);
    if($likes->DejaVote()||$dislikes->DejaVote()) {
        echo '<hr><button type="button" class="btn btn-success disabled">  <i class="glyphicon glyphicon-thumbs-up"></i><h3>'.$likes->getLikesParArticle().'</h3></button>
            |
            <button type="button" class="btn btn-danger disabled"><i class="glyphicon glyphicon-thumbs-down"></i><h3>'.$dislikes->getDislikesParArticle().'</h3></button>';
    }
    else{
        echo '<hr><button type="button" class="btn btn-success up">
            <i class="glyphicon glyphicon-thumbs-up"></i><h3>'.$likes->getLikesParArticle().'</h3></button>
            |
            <button type="button" class="btn btn-danger down"><i class="glyphicon glyphicon-thumbs-down"></i><h3>'.$dislikes->getDislikesParArticle().'</h3></button>';
    }
    echo '<div class="errorajax"></div>';
}

?>