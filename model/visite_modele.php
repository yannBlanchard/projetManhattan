<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 18/05/2015
 * Time: 11:39
 */

include_once "connexion_modele.php";

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

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
    public function Delete_Visite($ip,$idarticle){

        $ip_user=$ip;
        $idarti=$idarticle;
        $req = $this->bdd->prepare("Delete from visite where IP = :ip AND Art_id_article = :idarticle");
        $req->bindParam(':ip',$ip_user);
        $req->bindParam(':idarticle',$idarti);
        $req->execute();
    }
    public function Set_Visite($ip,$date,$idarticle){
        $req = $this->bdd->prepare("Insert into visite (IP,date_visite,Art_id_article) values(:ip,:datevisite,:idarticle)");
        $req->bindParam(':ip',$ip);
        $req->bindParam(':idarticle',$idarticle);
        $req->bindParam(':datevisite',$date);
        $req->execute();
    }
	public function Get_Day_Visits($data){
        $req = $this->bdd->prepare("Select * from visite where date_visite LIKE :datevisite");
        $dat=$data."%";
        $req->bindParam(':datevisite',$dat);
        $req->execute();
	$count = $req->rowCount();
        return $count;
    }
	public function Get_All_Visits(){
        $req = $this->bdd->prepare("Select * from visite");
        $req->execute();
	$count = $req->rowCount();
        return $count;
    }

}