<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 16/04/2015
 * Time: 20:12
 * Cette classe prend en compte les fonctions par rapport à un article.
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

    /**
     * @param $titre
     * @param $corps
     * @param $date
     * @param $image
     * @param $pseudo
     * Fonction qui permet d'insérer un article dans la base de données.
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
     * Fonction qui permet d'apporter une modification à un article qui existe déjà.
     */
    public function updateArticle($id_article,$titre,$corps,$image){

        $req = $this->bdd->prepare("update article set titreArticle = :titreArticle,
                              corpsArticle = :corpsArticle,imageArticle = :imageArticle where id_article = :id_article");

        $req->bindParam(':titreArticle',$titre);
        $req->bindParam(':corpsArticle',$corps);
        $req->bindParam(':imageArticle',$image);
        $req->bindParam(':id_article',$id_article);

        $req->execute();
    }

    /**
     * @param $id_article
     * Fonction qui permet de supprimer un article existant.
     */
    public function deleteArticle($id_article){
        $idarticle=$id_article;
        $req = $this->bdd->prepare("delete From article where id_article = :id_article");
        $req->bindParam(':id_article',$idarticle);
        $req->execute();
    }

    /**
     * @param $limite
     * @param $limite2
     * @return array
     * Fonction qui permet de récupérer les articles.
     * Puis ils s'affichent sur la page principale.
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
     * Fonction qui permet de récuperer les articles triés par mois de publication.
     */
    public function recupererArticleParMois($mois,$limite){

        $req = $this->bdd->query("select * From article where date_Article like '%/'+:mois+'/%' ORDER BY date_Article LIMIT :limite");
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
     * Fonction qui permet de recuperer les articles en fonction de leur clé.
     * C'est à dire par rapport à leur id.
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
     * @param $auteur
     * @return array
     * Fonction qui permet de recuperer les article en fonction de l'auteur.
     */
    public function recupererArticleParAuteur($auteur){

        $req = $this->bdd->prepare("select * From article where Mem_pseudo = :auteur");
        $req->bindParam(':auteur',$aut);

        $aut=$auteur;
        $req->execute();
        $row = array();
        $row = $req->fetchAll();
        return $row;
    }

    /**
     * @param $titre
     * @return array
     * Fonction qui permet de recuperer les articles en fonction de leur titre.
     */
    public function recupererArticleParTitre($titre){

    $req = $this->bdd->prepare("SELECT * FROM `article` WHERE `titreArticle` LIKE :titre");
    $req->bindParam(':titre',$tit);

    $tit='%'.$titre.'%';
    $req->execute();
    $row = array();
    $row = $req->fetchAll();
    return $row;
    }
    public function recupererArticleParDate($date){

        $req = $this->bdd->prepare("SELECT * FROM `article` WHERE `date_article` LIKE :dat ORDER BY `date_article` DESC");
        $req->bindParam(':dat',$data);

        $data=$date."%";
        $req->execute();
        $row = array();
        $row = $req->fetchAll();
        return $row;
    }
    /**
     * @param $cle
     * @return array
     * Fonction qui permet de compter les commentaires pour un article.
     * Chaque commentaire est spécifique à un article.
     */
    public function CountCommentairesParArticle($cle){
        $req = $this->bdd->prepare("Select * From commentaire where Art_id_article = :cle");
        $key=$cle;
        $req->bindParam(':cle',$key);

        $req->execute();
        $count = $req->rowCount();
        return $count;
    }
    public function Get_Visite_Par_Article($cle){
    $req = $this->bdd->prepare("Select * from visite where Art_id_article = :cle");
    $req->bindParam(':cle',$key);
    $key=$cle;
    $req->execute();
        $count = $req->rowCount();
        return $count;
    }
    public function Get_Like_Par_Article($cle){
    $req = $this->bdd->prepare("Select * from likes where Art_id_article = :cle");
    $req->bindParam(':cle',$key);
    $key=$cle;
    $req->execute();
        $count = $req->rowCount();
        return $count;
    }
        public function Get_Dislike_Par_Article($cle){
    $req = $this->bdd->prepare("Select * from dislike where Art_id_article = :cle");
    $req->bindParam(':cle',$key);
    $key=$cle;
    $req->execute();
        $count = $req->rowCount();
        return $count;
    }

}