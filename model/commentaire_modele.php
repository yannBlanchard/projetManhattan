<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 16/04/2015
 * Time: 20:10
 * Cette classe prend en compte les fonctions pour un commentaire.
 */

require_once( "connexion_modele.php");

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

    /**
     * @param $pseudo
     * @param $corps
     * @param $date
     * @param $idArticle
     * Fonction qui permet d'insérer un commentaire par rapport à un article.
     */
    public function insertCommentaire($pseudo,$corps,$date,$idArticle){

        $req = $this->bdd->prepare("insert into commentaire (PseudoCommentaire,corpsCommentaire,date_commentaire,etat,Art_id_article)
                                  value(:pseudoCommentaire,:corpsCommentaire,:date_commentaire,:etat,:Art_id_article)");

        $etat = 0;
        $req->bindParam(':pseudoCommentaire', $pseudo);
        $req->bindParam(':corpsCommentaire', $corps);
        $req->bindParam(':date_commentaire', $date);
        $req->bindParam(':etat', $etat);
        $req->bindParam(':Art_id_article', $idArticle);

        $req->execute();
    }

    /**
     * @param $id_commentaire
     * Fonction qui permet de mettre à jour un commentaire.
     */
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

    /**
     * @param $id_commentaire
     * Fonction qui permet de supprimer un commentaire.
     */
    public function deleteCommentaire($id_commentaire){
        $req = $this->bdd->prepare("delete From commentaire where id_commentaire = :id_commentaire");
        $req->execute(array
        (
            'id_commentaire' => $this->id_commentaire,
        ));
    }

    /**
     * @param $cle
     * @return array
     * Fonction qui permet de récupérer les commentaires pour un article.
     * Chaque commentaire est spécifique à un article.
     */
    public function recupererCommentairesParArticle($cle){
        $req = $this->bdd->prepare("Select * From commentaire where Art_id_article = :cle ORDER BY date_commentaire DESC");
        $key=$cle;
        $req->bindParam(':cle',$key);

        $req->execute();
        $row = array();
        $row = $req->fetchAll();
        return $row;
    }


    /**
     * @param $titreCommentaire
     * @param $corpsCommentaire
     * @param $date_commentaire
     * @return int
     * Fonction qui va émettre à un membre qu'il a eu un commentaire sur un de ses articles.
     * Pour cela, une notification sera affiché sur son panel.
     *
     */
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