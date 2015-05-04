<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 16/04/2015
 * Time: 20:12
 */

require "model/connexion_modele.php";

class article {

    public $id_article;
    public $titreArticle;
    public $corpsArticle;
    public $date_Aticle;
    public $imageArticle;
    public $bdd;


    //File > Settings (Ctrl+Alt+S) > Project Settings > Inspections > PHP > Undefined > Undefined variable cocher ou decocher pour eviter les erreurs d'include
    public function __construct($id_article,$titreArticle,$corpsArticle,$date_Aticle,$imageArticle){
        $this->id_article = $id_article;
        $this->titreArticle = $titreArticle;
        $this->corpsArticle = $corpsArticle;
        $this->date_Aticle = $date_Aticle;
        $this->imageArticle = $imageArticle;
        $this->bdd = BDD();
    }

    public function insertArticle($pseudo){

        $req = $this->bdd->prepare("insert into article (id_article,titreArticle,corpsArticle,date_Aticle,imageArticle,Mem_pseudo)
                                  value(:id_article,:titreArticle,:corpsArticle,:date_Aticle,:imageArticle,:pseudo)");
        $req->execute(array
        ('id_article' => $this->id_article,
            'titreArticle' => $this->titreArticle,
            'corpsArticle' => $this->corpsArticle,
            'date_Aticle' => $this->date_Aticle,
            'imageArticle' => $this->imageArticle,
            'pseudo' => $pseudo
        ));
    }

    public function updateArticle($id_article){

        $req = $this->bdd->prepare("update article set titreArticle = :titreArticle,
                              corpsArticle = :corpsArticle,date_Aticle = :date_Aticle,imageArticle = :imageArticle where id_article = :id_article");
        $req->execute(array
        ('titreArticle' => $this->titreArticle,
            'corpsArticle' => $this->corpsArticle,
            'date_Aticle' => $this->date_Aticle,
            'imageArticle' => $this->imageArticle,
            'id_article' => $id_article,
        ));
    }

    public function deleteArticle($id_article){

        $req = $this->bdd->prepare("delete From article where id_article = ':id_article'");
        $req->execute(array
        (
            'id_article' => $this->id_article
        ));
    }

    public function recupererArticle($limite,$limite2){

        $req = $this->bdd->query("select * From article ORDER BY date_Aticle DESC LIMIT :limite , :limite2");
        /*$req->execute(array
        (
            ':limite' => $limite,
            ':limite2' => $limite2
        ));*/
        $req->execute(array(':limite' => $limite, ':limite2' => $limite2));
        $req->fetchAll();
        return $req;
    }

    public function recupererArticleParMois($mois,$limite){

        $req = $this->bdd->query("select * From article where date_Aticle like '%/:mois/%' ORDER BY date_Aticle LIMIT :limite");
        $req->execute(array
        (
            'mois' => $mois,
            'limite' => $limite
        ));
        return $req->fetchAll();
    }


    public function rechercherArticle($titreArticle){

        $req = $this->bdd->query("select titreArticle from article");
        $req->execute(array(
        'titreArticle' => $titreArticle));
    }
}