<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 16/04/2015
 * Time: 21:59
 * Cette classe prend en compte les fonctions pour "ne pas aimer" un article.
 */
include_once "connexion_modele.php";
class Dislike {

    public $pseudo;
    public $Art_id_article;
    public $bdd;
    /**
     * Fonction qui permet de mettre "j'aime pas" sur un article.
     */
    public function __construct($pseudo,$artid){
        $this->pseudo=$pseudo;
        $this->Art_id_article;
        $this->bdd = BDD();
    }

    /**
     * Fonction qui permet de mettre "j'aime" à un article.
     */
    public function insertDislikes(){

        $req = $this->bdd->prepare("insert into Dislikes (pseudo,Art_id_article)
                                  value(:pseudo,:Art_id_article)");
        $req->bindParam(':pseudo',$this->pseudo);
        $req->bindParam(':Art_id_article',$this->Art_id_article);
        $req->execute();


    }
    /**
     * @param $idLikes
     * Fonction qui permet d'enlever le "j'aime" d'un article.
     *
     */
    public function deleteDislikes(){
        $req = $bdd->prepare("delete From Dislikes where where pseudo=:pseudo And Art_id_article=:Art_id_article" );
        $req->bindParam(':pseudo',$this->pseudo);
        $req->bindParam(':Art_id_article',$this->Art_id_article);
        $req->execute();
    }
    public function DejaVote(){

        $req = $this->bdd->prepare("Select * from Dislikes where pseudo=:pseudo And Art_id_article=:Art_id_article");
        $req->bindParam(':pseudo',$this->pseudo);
        $req->bindParam(':Art_id_article',$this->Art_id_article);
        $req->execute();
        $count = $req->rowCount();
        return $count;

    }
}