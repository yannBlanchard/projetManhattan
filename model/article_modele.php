<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 16/04/2015
 * Time: 20:12
 */

class article {
    public $id_article;
    public $titreArticle;
    public $corpsArticle;
    public $date_Aticle;
    public $imageArticle;
    //File > Settings (Ctrl+Alt+S) > Project Settings > Inspections > PHP > Undefined > Undefined variable cocher ou decocher pour eviter les erreurs d'include
    public function __construct($id_article,$titreArticle,$corpsArticle,$date_Aticle,$imageArticle){
        $this->id_article = $id_article;
        $this->titreArticle = $titreArticle;
        $this->corpsArticle = $corpsArticle;
        $this->date_Aticle = $date_Aticle;
        $this->imageArticle = $imageArticle;
    }

    public function insertArticle(){
        include_once "connexion_modele.php";
        $req = $bdd->prepare("insert into article (id_article,titreArticle,corpsArticle,date_Aticle,imageArticle)
                                  value(:id_article,:titreArticle,:corpsArticle,:date_Aticle,:imageArticle)");
        $req->execute(array
        ('id_article' => $this->id_article,
            'titreArticle' => $this->titreArticle,
            'corpsArticle' => $this->corpsArticle,
            'date_Aticle' => $this->date_Aticle,
            'imageArticle' => $this->imageArticle
        ));
    }

    public function updateArticle($id_article){
        include_once "connexion_modele.php";
        $req = $bdd->prepare("update article set titreArticle = :titreArticle,
                              corpsArticle = :corpsArticle,date_Aticle = :date_Aticle,imageArticle = :imageArticle where id_article = ':id_article'");
        $req->execute(array
        ('titreArticle' => $this->titreArticle,
            'corpsArticle' => $this->corpsArticle,
            'date_Aticle' => $this->date_Aticle,
            'imageArticle' => $this->imageArticle,
            'id_article' => $id_article,
        ));
    }

    public function deleteArticle($id_article){
        include_once "connexion_modele.php";
        $req = $bdd->prepare("delete From article where id_article = ':id_article'");
        $req->execute(array
        (
            'id_article' => $this->id_article,
        ));
    }
}