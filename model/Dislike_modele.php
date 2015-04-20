<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 16/04/2015
 * Time: 21:59
 */
include_once "connexion_modele.php";
class Dislike {
    public $Dislike;
    public $pseudo;
    public $Art_id_article;

    public function insertDislike(){

        $req = $bdd->prepare("insert into Dislike (idDislike,pseudo,Art_id_article)
                                  value(:idDislike,:pseudo,:Art_id_article)");
        $req->execute(array
        ('idDislike' => $this->idLikes,
            'pseudo' => $this->pseudo,
            'Art_id_article' => $this->Art_id_article
        ));
    }

    /*public function updateDislike($Dislike){
        include_once "connexion_modele.php";
        $req = $bdd->prepare("update Dislike set pseudo = :pseudo,Art_id_article = :Art_id_article
                              where idDislike = ':idDislike'");
        $req->execute(array
        (
            'pseudo' => $this->pseudo,
            'Art_id_article' => $this->Art_id_article,
            'idDislike' => $this->idLikes
        ));
    }*/

    public function deleteDislike($Dislike){
        $req = $bdd->prepare("delete From Dislike where idDislike = ':idDislike'");
        $req->execute(array
        (
            'idDislike' => $this->idDislike,
        ));
    }
}