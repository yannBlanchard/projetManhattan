<?php
/**
 * Created by PhpStorm.
 * User: austepha
 * Date: 13/04/2015
 * Time: 12:10
 * Classe membre en orienté objet. Elle prend en compte les différentes fonction qui sont en lien avec l'utilisateur.
 */
include_once "connexion_modele.php";
class Membre{

    public $nom;
    public $prenom;
    public $email;
    public $pseudo;
    public $mdp;
    public $droit;
    public $bdd;

    public function __construct($nom, $prenom, $email,$pseudo, $mdp, $droit){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->droit = $droit;
        $this->bdd = BDD();
    }

    /**
     * @param $email
     * @return bool
     * Fonction qui vérifie que l'adresse mail est bien conforme.
     */
    public function VerifierAdresseMail($email)
    {
        $Syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
        if (preg_match($Syntaxe, $email)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $nom
     * @param $prenom
     * @param $email
     * @param $pseudo
     * @param $droit
     * @param $avatar
     * @param $mdp
     * Fonction qui permet d'insérer l'inscription d'un utilisateur.
     */
    public function InscriptionUti ($nom,$prenom,$email,$pseudo,$droit,$avatar,$mdp)
    {
            $req = $this->bdd->prepare('INSERT INTO membre (nom, prenom, pseudo, email, droit, avatar, mdp) VALUES ("'.$nom.'","'.$prenom.'","'.$pseudo.'","'.$email.'",'.$droit.',"'.$avatar.'","'.$mdp.'")');
           
            $req->execute();

    }

    /**
     * @param $pseudo
     * @return mixed
     * Fonction qui permet de vérifier le pseudo d'un utilisateur.
     */
    public function VerificationExistancePseudo($pseud){
	$pseud=$pseudo;
        $req = $this->bdd->prepare('SELECT * FROM membre WHERE pseudo = :pseudo');
        $req->bindParam('pseudo',$pseud);
	$req->execute();
       $count = $req->rowCount();
	return ($count>0)?true:false;
       	
    }

    /**
     * @param $email
     * @return mixed
     * Fonction qui permet de vérifier l'éxistance d'un mail.
     */
    public function VerificationExistanceEmail($email){
        $req = $this->bdd->prepare('SELECT * FROM membre WHERE email = :email');
        $mail=$email;
        $req->bindParam(':email', $mail);
        $req->execute();
        $count = $req->rowCount();
        return $count;
    }

    /**
     * @param $pseudo
     * @param $mdp
     * @return int
     * Fonction qui permet à un utilisateur de se connecter avec son pseudo et son mot de passe.
     */
    public function connexionMembre($pseudo, $mdp) {
        $req = $this->bdd->prepare('SELECT * FROM membre WHERE pseudo = :pseudo AND mdp= :mdp ');
        $req->bindParam('pseudo',$pseudo);
        $req->bindParam('mdp',$mdp);
        $req->execute();

        $data = $req->rowCount();
        return $data;
    }

    /**
     * @param $lien
     * @param $pseudo
     * Fonction qui permet à un utilisateur de modifier sa photo de profil(avatar).
     */
    public function updateAvatar($lien,$pseudo){
        $req = $this->bdd->prepare('UPDATE membre set avatar = :lien where pseudo = :pseudo');
        $req->bindParam(':lien',$lien);
        $req->bindParam(':pseudo',$pseudo);
        $req->execute();
    }

    /**
     * @param $pseudo
     * @param $mdp
     * Fonction qui permet de modifier le mot de passe.
     * Dans le cas ou un membre aurait oublier son mot de passe.
     * Il le redéfinit.
     */
    public function modificationMdp($pseudo, $mdp){
        $req = $bdd->prepare('UPDATE membre set mdp = :mdp where pseudo = :pseudo');
        $req->execute(array('$pseudo' => $pseudo, 'mdp' => $mdp));
    }
    /**
     * @param $cle
     * @return array
     * Fonction qui permet de compter les commentaires pour un auteur.
     * Chaque commentaire est spécifique à un article.
     */
    public function CountCommentairesParAuteur($auteur){
        $req = $this->bdd->prepare("Select * From commentaire where Art_id_article IN (Select id_article from article where Mem_pseudo = :auteur)");
        $aut=$auteur;
        $req->bindParam(':auteur',$aut);

        $req->execute();
        $count = $req->rowCount();
        return $count;
    }
    public function Get_Visite_Par_Auteur($auteur){
        $req = $this->bdd->prepare("Select * from visite where Art_id_article IN (Select id_article from article where Mem_pseudo = :auteur)");
        $req->bindParam(':auteur',$aut);
        $aut=$auteur;
        $req->execute();
        $count = $req->rowCount();
        return $count;
    }
    public function Get_Img_By_Auteur($auteur){
        $req = $this->bdd->prepare("Select avatar from membre where pseudo = :auteur");
        $aut=$auteur;
        $req->bindParam(':auteur',$aut);

        $req->execute();
        $row = array();
        $row = $req->fetchAll();
        return $row;
    }
    public function Count_Article_By_Auteur($auteur){
        $req = $this->bdd->prepare("Select * from article where Mem_pseudo = :auteur");
        $aut=$auteur;
        $req->bindParam(':auteur',$aut);

        $req->execute();
        $count = $req->rowCount();
        return $count;
    }
    public function Get_Dislike_Par_Auteur($auteur){
    $req = $this->bdd->prepare("Select * from dislike where Art_id_article IN (Select * from article where Mem_pseudo = :auteur)");
    $aut=$auteur;
        $req->bindParam(':auteur',$aut);

        $req->execute();
        $count = $req->rowCount();
        return $count;
    }
        public function Get_Like_Par_Auteur($auteur){
    $req = $this->bdd->prepare("Select * from likes where Art_id_article IN (Select * from article where Mem_pseudo = :auteur)");
    $aut=$auteur;
        $req->bindParam(':auteur',$aut);

        $req->execute();
        $count = $req->rowCount();
        return $count;
    }

    public function Get_Comments_Par_Auteur($auteur){
    $req = $this->bdd->prepare("Select * from commentaire where etat = 0 AND Art_id_article IN (Select * from article where Mem_pseudo = :auteur)");
    $aut=$auteur;
        $req->bindParam(':auteur',$aut);
        $req->execute();
        $row = array();
        $row = $req->fetchAll();
        return $row;
    }
}