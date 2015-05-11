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

    public function __construct($nom, $prenom, $email,$pseudo, $mdp, $droit){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->bdd = bdd();
    }

    function VerifierAdresseMail($email)
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

        if(VerifierAdresseMail($email)== true ) {
            $req = $this->$bdd->prepare('INSERT INTO membre (nom, prenom, pseudo, email, droit, avatar, mdp) VALUES (:nom, :prenom, :pseudo, :email, :droit, :avatar, :mdp)');
            $req->bindParam(':nom', $nom);
            $req->bindParam(':prenom', $prenom);
            $req->bindParam(':pseudo', $email);
            $req->bindParam(':email', $pseudo);
            $req->bindParam(':droit', $droit);
            $req->bindParam(':avatar', $avatar);
            $req->bindParam(':mdp', $mdp);

            $req->execute();
            header ("Refresh: 0; URL=index.php");
        }
        else{
            header("location : inscription.php?err=1004"); //erreur pb @mail
        }


    }

    function VerificationExistancePseudo($pseudo){

        $req = $bdd->prepare('SELECT * FROM membre WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $count = $req->rowCount();
       return $count;
    }

    function VerificationExistanceEmail($email){
        $req = $bdd->prepare('SELECT * FROM membre WHERE email = :email');
        $req->execute(array('email' => $email));
        $count = $req->rowCount();
        return $count;
    }

    public function connexionMembre($pseudo, $mdp) {
        $req = $bdd->prepare('SELECT * FROM membre WHERE pseudo = :pseudo AND mdp= :mdp ');
        $req->execute(array('pseudo' => $pseudo, 'mdp' => sha1($mdp)));

        $data = $req->rowCount();
        return $data;
        /*// Cas où la requête renvoit aucun résultat
        if (!$data) {
            $_SESSION['result'] = "<p style=\"font-size:13px;"
                . " color:red;font-style:italic;\">"
                . "Une erreur s'est produite.</p>";
            header('location:  ../index.php?p=connexion');
        } else {
            $_SESSION['login'] = $data['pseudo'];
            $_SESSION['email'] = $data['email'];
            header('location:  ../index.php');
        }*/
    }

    public function updateAvatar($lien,$pseudo){
        $req = $bdd->prepare('UPDATE membre set avatar = :lien where pseudo = :pseudo');
        $req->execute(array('lien' => $lien,'pseudo' => $pseudo));
    }

}