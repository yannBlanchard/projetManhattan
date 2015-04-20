<?php
class categorie{
    public $nomCategorie;
    public $Art_id_article;

    public function __construct($nomCategorie){
        $this->nomCategorie = $nomCategorie;
        $this->Art_id_article = $Art_id_article;
    }

    public function insertCategorie($nomCategorie,$Art_id_article){
        include_once("connexion_modele.php");

        $req = $bdd->prepare("insert into categorie (nomCategorie) value(:nomCategorie)");
        $req->execute(array
        ('nomCategorie' => $this->nomCategorie,
        ));
    }
    /*public function updateCategorie($nomCategorie,$Art_id_article){
        include_once("connexion_modele.php");

        $req = $bdd->prepare("update categorie set nomCategorie = :nomCategorie,Art_id_article = :Art_id_article)");
        $req->execute(array
        ('nomCategorie' => $this->nomCategorie,
            'Art_id_article' => $this->Art_id_article
        ));
    }*/
}
?>