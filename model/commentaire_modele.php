<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 16/04/2015
 * Time: 20:10
 */

include_once "../model/connexion_modele.php";

class commentaire {
    public $id_commentaire;
    public $titreCommentaire;
    public $corpsCommentaire;
    public $date_commentaire;
    public $etat;
    public $Art_id_article;
    public $bdd;

    public function __construct($id_commentaire,$titreCommentaire,$corpsCommentaire,$date_commentaire,$etat,$Art_id_article){
        $this->id_commentaire = $id_commentaire;
        $this->titreCommentaire = $titreCommentaire;
        $this->corpsCommentaire = $corpsCommentaire;
        $this->date_commentaire = $date_commentaire;
        $this->etat = $etat;
        $this->Art_id_article = $Art_id_article;
        $this->bdd = BDD();
    }

    public function insertCommentaire($pseudo,$corps,$date,$idArticle){

        $req = $this->bdd->prepare("insert into commentaire (titreCommentaire,corpsCommentaire,date_commentaire,etat,Art_id_article)
                                  value(:titreCommentaire,:corpsCommentaire,:date_commentaire,'0',:Art_id_article)");

        $req->bindParam(':pseudoCommentaire', $pseudo);
        $req->bindParam(':corpsCommentaire', $corps);
        $req->bindParam(':date_commentaire', $date);
        $req->bindParam(':Art_id_article', $idArticle);

        $req->execute();
    }

    public function updateCommentaire($id_commentaire){
        $req = $this->bdd->prepare("update commentaire set pseudoCommentaire = :pseudoCommentaire,
                              corpsCommentaire = :corpsCommentaire,date_commentaire = :date_commentaire,etat = :etat where id_commentaire = ':id_commentaire'");
        $req->execute(array
        (
            'pseudoCommentaire' => $this->pseudoCommentaire,
            'corpsCommentaire' => $this->corpsCommentaire,
            'date_commentaire' => $this->date_commentaire,
            'etat' => $this->etat,
            'id_commentaire' => $this->id_commentaire
        ));
    }

    public function deleteCommentaire($id_commentaire){
        $req = $this->bdd->prepare("delete From commentaire where id_commentaire = :id_commentaire");
        $req->execute(array
        (
            'id_commentaire' => $this->id_commentaire,
        ));
    }

    public function recupererCommentairesParArticle($cle){
        $req = $this->bdd->prepare("Select * From commentaire where Art_id_article = :cle ORDER BY date_commentaire DESC");
        $key=$cle;
        $req->bindParam(':cle',$key);

        $req->execute();
        $row = array();
        $row = $req->fetchAll();
        return $row;
    }

    public function notificationCommentaire($titreCommentaire, $corpsCommentaire, $date_commentaire){

        $req = $this->bdd->prepare("SELECT titreCommentaire, corpsCommentaire, date_commentaire  FROM commentaire");

        $req->execute(array
        (
            'titreCommentaire' => $this->titreCommentaire,
            'corpsCommentaire' => $this->corpsCommentaire,
            'date_commentaire' => $this->date_commentaire,
        ));
       return $req->rowCount();
        }

}