<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 18/05/2015
 * Time: 11:39
 */

include_once "connexion_modele.php";
class Visite
{
    public $IP;
    public $date_visite;
    public $Art_id_article;
    public $bdd;

    public function __construct($ip, $datevisite, $idarticle)
    {
        $this->IP = $ip;
        $this->date_visite = $datevisite;
        $this->Art_id_article = $idarticle;
        $this->bdd = bdd();
    }

    public function Set_Visite($ip, $idarticle){
        $req = $this->bdd->prepare("Delete from visite where IP = :ip AND Art_id_article = :idarticle");
        $req->bindParam(':ip',$ip);
        $req->bindParam(':idarticle',$idarticle);
        $req->execute();

        $req = $this->bdd->prepare("Insert into visite values(:ip,date('Y-m-d'),:idarticle");
        $req->bindParam(':ip',$ip);
        $req->bindParam(':idarticle',$idarticle);
        $req->execute();
    }
    public function Get_Visite_Par_Article($cle){
        $req = $this->bdd->prepare("Select COUNT(*) from visite where Art_id_article = :cle");
        $req->bindParam(':cle',$key);
        $key=$cle;
        $req->execute();
        $row = array();
        $row = $req->fetchAll();
        return $row;


    }
}