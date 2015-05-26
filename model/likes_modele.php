<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 16/04/2015
 * Time: 21:48
 * Cette classe comprend les fonctions pour aimer un article.
 */
include_once "connexion_modele.php";
class Likes {
    public $pseudo;
    public $Art_id_article;
    public $bdd;


     public function __construct($pseudo,$artid){
         $this->pseudo=$pseudo;
         $this->Art_id_article;
         $this->bdd = BDD();
     }

    /**
     * Fonction qui permet de mettre "j'aime" à un article.
     */
    public function insertLikes(){

        $req = $this->bdd->prepare("insert into Likes (pseudo,Art_id_article)
                                  value(:pseudo,:Art_id_article)");
        $req->bindParam(':pseudo',$this->pseudo);
        $req->bindParam(':pseudo',$this->pseudo);
    }
/*
    public function updateLikes($idLikes){
        include_once "connexion_modele.php";
        $req = $bdd->prepare("update Likes set pseudo = :pseudo,Art_id_article = :Art_id_article
                              where idLikes = ':idLikes'");
        $req->execute(array
        (
            'pseudo' => $this->pseudo,
            'Art_id_article' => $this->Art_id_article,
            'idLikes' => $this->idLikes
        ));
    }
*/
    /**
     * @param $idLikes
     * Fonction qui permet d'enlever le "j'aime" d'un article.
     *
     */
    public function deleteLikes($idLikes){
        $req = $bdd->prepare("delete From Likes where idLikes = ':idLikes'");
        $req->execute(array
        (
            'idLikes' => $this->idLikes,
        ));
    }
}