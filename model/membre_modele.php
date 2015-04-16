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
          /*  $req = $bdd->prepare('SELECT * FROM WHERE pseudo = :login or email = :email');
            $req->execute(array
            ('login' => $login,
                'email' => $email
            ));
            $data = $req->fetch();*/
            //Controle du formulaire (mot de passes identiques, cases renseignées, disponibilité des identifiants)

               /*             // Le membre peut être ajouter dans la bdd
                            $bdd->exec('INSERT INTO ...() VALUES("' . $login . '", "' . sha1($password) . '",NOW(), "' . $email . '","'.$nom.'")');
                            $_SESSION['addMemberResult'] = "<p style=\"font-size:13px; color:green;font-style:italic;\">Le membre \"" . $login . "\" a été ajouté avec succès.</p>";

                        }*/


    public function Connexion($pseudo, $mdp) {
        include"connexion_modele.php";
        $req = $bdd->prepare('SELECT * FROM membre WHERE pseudo = :pseudo AND mdp= :mdp ');
        $req->execute(array('pseudo' => $pseudo, 'pwd' => sha1($mdp)));
        $data = $req->fetch();
        // Cas où la requête renvoit aucun résultat
        if (!$data) {
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