<?php
/**
 * Created by PhpStorm.
 * User: yablanch
 * Date: 20/04/2015
 * Time: 12:14
 */

if(isset($_GET['page'])){
    $article = recupererArticle($limite,$limite2);
    foreach($article as $cle => $infosArticle){

    }
}
else{
    header('location: index.php?page=1');
}
