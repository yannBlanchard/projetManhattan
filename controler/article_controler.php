<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 18/04/2015
 * Time: 16:38
 */

include_once "../model/article_modele.php";
$articles = recupererArticle(20);
foreach($article as $cle => $article)
{
    $articles[$cle]['titre'] = htmlspecialchars($billet['titre']);
    $articles[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
}
