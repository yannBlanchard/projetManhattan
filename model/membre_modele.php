<?php
/**
 * Created by PhpStorm.
 * User: austepha
 * Date: 13/04/2015
 * Time: 12:10
 *
 * Classe membre en orienté objet. Elle prend en compte les différentes fonction qui sont en lien avec l'utilisateur.
 */

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

    }

    public function InscriptionUti ($nom, $prenom, $email,$pseudo, $mdp, $mdp2)
    {
        include_once("connexion_modele.php");
        function VerifierAdresseMail($email)
        {
            $Syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
            if (preg_match($Syntaxe, $email)) {
                return true;
            } else {
                return false;
            }
        }


    }

    function VerificationExistancePseudo($pseudo){
        include_once "connexion_modele.php";
        $req = $bdd->prepare('SELECT * FROM membre WHERE pseudo = :pseudo');
        $req->execute(array(':pseudo' => $pseudo));
        $count = $req->rowCount();
        if($count==0){
            return 1;
        }
        else{
            return 0;
        }
    }

    function VerificationExistanceEmail($pseudo){
        include_once "connexion_modele.php";
        $req = $bdd->prepare('SELECT * FROM membre WHERE email = :email');
        $req->execute(array(':email' => email));
        $count = $req->rowCount();
        if($count==0){
            return 1;
        }
        else{
            return 0;
        }
    }

    public function Connexion($pseudo, $mdp) {
        include_once "connexion_modele.php";
        $req = $bdd->prepare('SELECT * FROM membre WHERE pseudo = :pseudo AND mdp= :mdp ');
        $req->execute(array(':pseudo' => $pseudo, ':pwd' => sha1($mdp)));

        $count = $req->rowCount();

        // Cas où la requête renvoit aucun résultat
        if ($count != 1) {
            $_SESSION['result'] = "<p style=\"font-size:13px;"
                . " color:red;font-style:italic;\">"
                . "Une erreur s'est produite.</p>";
            header('location:  ../index.php?p=connexion');
        } else {
            $_SESSION['id'] = $data['id_utilisateur'];
            $_SESSION['login'] = $data['login'];
            $_SESSION['nom'] = $data['nom'];
            $_SESSION['email'] = $data['email'];
            header('location:  ../index.php');
        }
    }
}