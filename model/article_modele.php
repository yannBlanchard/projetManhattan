<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 16/04/2015
 * Time: 20:12
 * Cette classe prend en compte les fonctions pour un article.
 */

include_once "connexion_modele.php";

class article {
    public $id_article;
    public $titreArticle;
    public $corpsArticle;
    public $date_Article;
    public $imageArticle;
    public $bdd;
    //File > Settings (Ctrl+Alt+S) > Project Settings > Inspections > PHP > Undefined > Undefined variable cocher ou decocher pour eviter les erreurs d'include
    public function __construct($id_article,$titreArticle,$corpsArticle,$date_Article,$imageArticle){
        $this->id_article = $id_article;
        $this->titreArticle = $titreArticle;
        $this->corpsArticle = $corpsArticle;
        $this->date_Article = $date_Article;
        $this->imageArticle = $imageArticle;
        $this->bdd = bdd();
    }

    /**
     * @param $titre
     * @param $corps
     * @param $date
     * @param $image
     * @param $pseudo
     * Fonction qui permet d'ajouter un article dans la base de données.
     */
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

    /**
     * @param $id_article
     * Fonction qui permet de modifier un article.
     */
    public function updateArticle($id_article){

        $req = $this->bdd->prepare("update article set titreArticle = :titreArticle,
                              corpsArticle = :corpsArticle,date_Article = :date_Article,imageArticle = :imageArticle where id_article = :id_article");
        $req->execute(array
        ('titreArticle' => $this->titreArticle,
            'corpsArticle' => $this->corpsArticle,
            'date_Article' => $this->date_Article,
            'imageArticle' => $this->imageArticle,
            'id_article' => $id_article,
        ));
    }

    /**
     * @param $id_article
     * Fonction qui permet de supprimer un article.
     */
    public function deleteArticle($id_article){

        $req = $this->bdd->prepare("delete From article where id_article = ':id_article'");
        $req->execute(array
        (
            'id_article' => $this->id_article
        ));
    }

    /**
     * @param $limite
     * @param $limite2
     * @return array
     * Fonction qui permet de récupérer un article dans la base de donnée.
     */
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

    /**
     * @param $mois
     * @param $limite
     * @return PDOStatement
     * Fonction qui permet de récupérer les articles suivant leur création par mois.
     */
    public function recupererArticleParMois($mois,$limite){

        $req = $this->bdd->query("select * From article where date_Article like '%/:mois/%' ORDER BY date_Article LIMIT :limite");
        $req->execute(array
        (
            'mois' => $mois,
            'limite' => $limite
        ));
        return $req;
    }

    /**
     * @param $cle
     * @return array
     * Fonction qui permet de récupérer les articles suivant leur clé.
     * C'est à dire en fonction de l'id de l'article.
     */
    public function recupererArticleParCle($cle){

        $req = $this->bdd->prepare("select * From article where id_article = :cle");
        $req->bindParam(':cle',$key);

        $key=$cle;
        $req->execute();
        $row = array();
        $row = $req->fetchAll();
        return $row;
    }


    /**
     * @param $titreArticle
     * @return PDOStatement
     * Fonction qui permet de faire une recherche dans les articles.
     * Cela permet à un utilisateur de retrouver un article en particulier.
     */
    public function rechercherArticle($titreArticle){

        $req = $this->bdd->query("select * from article Where titreArticle LIKE ‘%'.$titreArticle.'%’ ");
        $req->execute();
        return $req;
    }
}