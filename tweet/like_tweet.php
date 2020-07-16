<?php
session_start();
include('../inscription_connexion/connexion_bdd.php');

$id_user = $_SESSION['id'];
$id_tweet = $_POST['id_tweet'];



try{

    $like="";
    $requete_like = $bdd->query("SELECT COUNT(*) AS 'total' FROM `like`WHERE id_user= ".$id_user." AND id_tweet=".$id_tweet);
    while($donnees_like = $requete_like->fetch()){
        $like=$donnees_like['total'];
    }
    
    if($like==0){
        $connexion = $bdd->query("INSERT INTO `like`(id_tweet, id_user)
        VALUES ($id_tweet, $id_user)");
    }
  
    else{
       $connexion = $bdd->query("DELETE FROM `like` WHERE id_tweet=$id_tweet AND id_user= $id_user");
       echo "delete";
    }
    echo $like;

}
catch(PDOException $e){
    echo "Failed";
}
?>