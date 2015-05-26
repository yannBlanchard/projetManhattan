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
    $dislike=new Dislike($_SESSION['pseudo'],$_GET['cle']);
    if($likes->DejaVote()||$dislike->DejaVote()) {
        echo '<hr><button type="button" class="btn btn-success">  <i class="glyphicon glyphicon-thumbs-up"></i>Num</button>
            |
            <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-thumbs-down"></i>Num</button>';
    }
    else{
        echo '<hr><button type="button" class="btn btn-success up">
            <i class="glyphicon glyphicon-thumbs-up"></i>num</button>
            |
            <button type="button" class="btn btn-danger down"><i class="glyphicon glyphicon-thumbs-down"></i>num</button>';
    }
}
?>