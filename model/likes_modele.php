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
         $this->Art_id_article=$artid;
         $this->bdd = BDD();
     }

    /**
     * Fonction qui permet de mettre "j'aime" à un article.
     */
    public function insertLikes(){

        $req = $this->bdd->prepare("insert into likes (pseudo,Art_id_article) values(:pseudo,:Art_id_article)");
        $req->bindParam(':pseudo',$this->pseudo);
        $req->bindParam(':Art_id_article',$this->Art_id_article);
        $req->execute();


    }
    /**
     * @param $idLikes
     * Fonction qui permet d'enlever le "j'aime" d'un article.
     *
     */
    public function deleteLikes(){
        $req = $bdd->prepare("delete From likes where pseudo = :pseud And Art_id_article = :Art_id_article" );
        $req->bindParam(':pseud',$this->pseudo);
        $req->bindParam(':Art_id_article',$this->Art_id_article);
        $req->execute();
    }
    public function DejaVote(){

        $req = $this->bdd->prepare("Select * from likes where pseudo=:pseudo And Art_id_article=:Art_id_article");
        $pseudo=$this->pseudo;
        $req->bindParam(':pseudo',$pseudo);
        $cle=$this->Art_id_article;
        $req->bindParam(':Art_id_article',$cle);
        $req->execute();
        $count = $req->rowCount();
        return $count;

    }
    public function getLikesParArticle(){
        $req = $this->bdd->prepare("Select * from likes where Art_id_article=:Art_id_article");
        $cle=$this->Art_id_article;
        $req->bindParam(':Art_id_article',$cle);
        $req->execute();
        $count = $req->rowCount();
        return $count;

    }

    public function countLikeParAuteur($auteur){
        $req = $this->bdd->prepare("Select count(idLikes) from likes where pseudo=:auteur");
        $aut=$auteur;
        $req->bindParam(':auteur',$aut);
        $req->execute();
        $count = $req->rowCount();
        return $count;
    }

}