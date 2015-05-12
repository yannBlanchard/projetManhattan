<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 16/04/2015
 * Time: 20:10
 */

include_once "connexion_modele.php";

class commentaire {
    public $id_commentaire;
    public $titreCommentaire;
    public $corpsCommentaire;
    public $date_commentaire;
    public $etat;
    public $Art_id_article;

    public function __construct($id_commentaire,$titreCommentaire,$corpsCommentaire,$date_commentaire,$etat,$Art_id_article){
        $this->id_commentaire = $id_commentaire;
        $this->titreCommentaire = $titreCommentaire;
        $this->corpsCommentaire = $corpsCommentaire;
        $this->date_commentaire = $date_commentaire;
        $this->etat = $etat;
        $this->Art_id_article = $Art_id_article;
    }

    public function insertCommentaire(){

        $req = $bdd->prepare("insert into commentaire (id_commentaire,titreCommentaire,corpsCommentaire,date_commentaire,etat,Art_id_article)
                                  value(:id_commentaire,:titreCommentaire,:corpsCommentaire,:date_commentaire,:etat,:Art_id_article)");
        $req->execute(array
        ('id_commentaire' => $this->id_commentaire,
            'titreCommentaire' => $this->titreCommentaire,
            'corpsCommentaire' => $this->corpsCommentaire,
            'date_commentaire' => $this->date_commentaire,
            'etat' => $this->etat,
            'Art_id_article' => $this->Art_id_article
        ));
    }

    public function updateCommentaire($id_commentaire){
        $req = $bdd->prepare("update commentaire set titreCommentaire = :titreCommentaire,
                              corpsCommentaire = :corpsCommentaire,date_commentaire = :date_commentaire,etat = :etat where id_commentaire = ':id_commentaire'");
        $req->execute(array
        (
            'titreCommentaire' => $this->titreCommentaire,
            'corpsCommentaire' => $this->corpsCommentaire,
            'date_commentaire' => $this->date_commentaire,
            'etat' => $this->etat,
            'id_commentaire' => $this->id_commentaire
        ));
    }

    public function deleteCommentaire($id_commentaire){
        $req = $bdd->prepare("delete From commentaire where id_commentaire = ':id_commentaire'");
        $req->execute(array
        (
            'id_commentaire' => $this->id_commentaire,
        ));
    }

    public function recupererCommentairesParArticle($cle){
        $req = $bdd->prepare("Select * From commentaire where Art_id_article = ':cle' ORDER BY date_commentaire DESC");
        $req->bindParam(':cle',$key);

        $key=$cle;
        $req->execute();
        $row = array();
        $row = $req->fetchAll();
        return $row;
    }

    public function notificationCommentaire($titreCommentaire, $corpsCommentaire, $date_commentaire){

        $req = $bdd->prepare("SELECT titreCommentaire, corpsCommentaire, date_commentaire  FROM commentaire");

        $req->execute(array
        (
            'titreCommentaire' => $this->titreCommentaire,
            'corpsCommentaire' => $this->corpsCommentaire,
            'date_commentaire' => $this->date_commentaire,
        ));
       return $req->rowCount();
        }

}