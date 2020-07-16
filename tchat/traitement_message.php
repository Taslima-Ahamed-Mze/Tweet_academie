<?php
session_start();
include('../inscription_connexion/connexion_bdd.php');
    
echo $message=strip_tags($_POST['message']);
echo $id_envoie=$_SESSION['id'];
echo $id_recois=$_POST['id_recois'];

try{

    $connexion = $bdd->query("INSERT INTO message(id_expeditor, id_receiver, message_date, content_message)
    VALUES ($id_envoie, $id_recois, NOW(), '".$message."')");

    echo "Success";

}
catch(PDOException $e){
    echo "Failed";
}
?>
