<?php
/**
 * Created by PhpStorm.
 * User: austepha
 * Date: 13/04/2015
 * Time: 12:10
 *
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

    public function VerifierAdresseMail($email)
    {
        $Syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
        if (preg_match($Syntaxe, $email)) {
            return true;
        } else {
            return false;
        }
    }

    public function InscriptionUti ($nom, $prenom, $email,$pseudo, $droit, $avatar, $mdp)
    {
            $req = $this->bdd->prepare('INSERT INTO membre (nom, prenom, pseudo, email, droit, avatar, mdp) VALUES (:nom, :prenom, :pseudo, :email, :droit, :avatar, :mdp)');
            $req->bindParam(':nom', $nom);
            $req->bindParam(':prenom', $prenom);
            $req->bindParam(':pseudo', $pseudo);
            $req->bindParam(':email', $email);
            $req->bindParam(':droit', $droit);
            $req->bindParam(':avatar', $avatar);
            $req->bindParam(':mdp', $mdp);

            $req->execute();

    }

    public function VerificationExistancePseudo($pseudo){

        $req = $bdd->prepare('SELECT * FROM membre WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $count = $req->rowCount();
       return $count;
    }

    public function VerificationExistanceEmail($email){
        $req = $bdd->prepare('SELECT * FROM membre WHERE email = :email');
        $req->execute(array('email' => $email));
        $count = $req->rowCount();
        return $count;
    }

    public function connexionMembre($pseudo, $mdp) {
        $req = $this->bdd->prepare('SELECT * FROM membre WHERE pseudo = :pseudo AND mdp= :mdp ');
        $req->bindParam('pseudo',$pseudo);
        $req->bindParam('mdp',$mdp);
        $req->execute();

        $data = $req->rowCount();
        return $data;
    }

    public function updateAvatar($lien,$pseudo){
        $req = $this->bdd->prepare('UPDATE membre set avatar = :lien where pseudo = :pseudo');
        $req->bindParam(':lien',$lien);
        $req->bindParam(':pseudo',$pseudo);
        $req->execute();
    }

    public function modificationMdp($pseudo, $mdp){
        $req = $bdd->prepare('UPDATE membre set mdp = :mdp where pseudo = :pseudo');
        $req->execute(array('$pseudo' => $pseudo, 'mdp' => $mdp));
    }
}