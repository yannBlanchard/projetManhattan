<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 16/04/2015
 * Time: 20:12
 */

include_once "connexion_modele.php";

class article {
    public $id_article;
    public $titreArticle;
    public $corpsArticle;
    public $date_Article;
    public $imageArticle;
    public $auteur;
    public $bdd;
    //File > Settings (Ctrl+Alt+S) > Project Settings > Inspections > PHP > Undefined > Undefined variable cocher ou decocher pour eviter les erreurs d'include
    public function __construct($id_article,$titreArticle,$corpsArticle,$date_Article,$imageArticle,$auteur){
        $this->id_article = $id_article;
        $this->titreArticle = $titreArticle;
        $this->corpsArticle = $corpsArticle;
        $this->date_Article = $date_Article;
        $this->imageArticle = $imageArticle;
        $this->auteur = $auteur;
        $this->bdd = bdd();
    }

    public function insertArticle($titre,$corps,$date,$image,$pseudo){

        $req = $this->bdd->prepare("insert into article (titreArticle,corpsArticle,date_Article,imageArticle,Mem_pseudo)
                                  value(:titreArticle,:corpsArticle,:date_Article,:imageArticle,:pseudo)");
        $req->bindParam(':titreArticle',$titre);
        $req->bindParam(':corpsArticle',$corps);
        $req->bindParam(':date_Article',$date);
        $req->bindParam(':imageArticle',$image);
        $req->bindParam(':pseudo',$pseudo);

        $req->execute();
    }

    public function updateArticle($id_article,$titre,$corps,$image){

        $req = $this->bdd->prepare("update article set titreArticle = :titreArticle,
                              corpsArticle = :corpsArticle,imageArticle = :imageArticle where id_article = :id_article");

        $req->bindParam(':titreArticle',$titre);
        $req->bindParam(':corpsArticle',$corps);
        $req->bindParam(':imageArticle',$image);
        $req->bindParam(':id_article',$id_article);

        $req->execute();
    }

    public function deleteArticle($id_article){

        $req = $this->bdd->prepare("delete From article where id_article = :id_article");
        $req->execute(array
        (
            'id_article' => $this->id_article
        ));
    }

    public function recupererArticle($limite,$limite2){

        $req = $this->bdd->prepare("select * From article ORDER BY date_Article DESC LIMIT :min , :max");
        $req->bindParam(':min',$min);
        $req->bindParam(':max',$max);

        $min = $limite;
        $max = $limite2;
        $req->execute();

        /*$req->execute(array
        (
            'limite' => $limite,
            'limite2' => $limite2
        ));*/
        $row = array();
        $row = $req->fetchAll();
        /*while($row = $req->fetchAll()){
            /*echo $article['date_Aticle'];
            print_r($article);
        }*/

       // print_r($row);
        return $row;
    }

    public function recupererArticleParMois($mois,$limite){

        $req = $this->bdd->query("select * From article where date_Article like '%/'+:mois+'/%' ORDER BY date_Article LIMIT :limite");
        $req->execute(array
        (
            'mois' => $mois,
            'limite' => $limite
        ));
        return $req;
    }
    public function recupererArticleParCle($cle){

        $req = $this->bdd->prepare("select * From article where id_article = :cle");
        $req->bindParam(':cle',$key);

        $key=$cle;
        $req->execute();
        $row = array();
        $row = $req->fetchAll();
        return $row;
    }

    public function recupererArticleParAuteur($auteur){

        $req = $this->bdd->prepare("select * From article where Mem_pseudo = :auteur");
        $req->bindParam(':auteur',$aut);

        $aut=$auteur;
        $req->execute();
        $row = array();
        $row = $req->fetchAll();
        return $row;
    }
    public function recupererArticleParTitre($titre){

    $req = $this->bdd->prepare("SELECT * FROM `article` WHERE `titreArticle` LIKE :titre");
    $req->bindParam(':titre',$tit);

    $tit='%'.$titre.'%';
    $req->execute();
    $row = array();
    $row = $req->fetchAll();
    return $row;
    }

}