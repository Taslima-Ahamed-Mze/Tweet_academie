<?php
session_start();

$uploads_dir = './image';
$name = $_FILES["file"]["name"];

move_uploaded_file($_FILES["file"]["tmp_name"],"$uploads_dir/$name");

echo $id_envoie=$_SESSION['id'];
echo $id_recois=$_SESSION['id_recois'];
echo $image=$_POST['image'];

include('../inscription_connexion/connexion_bdd.php');


try{

    $connexion = $bdd->query("INSERT INTO message(id_expeditor, id_receiver, message_date, content_message)
    VALUES ($id_envoie, $id_recois, NOW(), '".$name."')");

    echo "Success";

}
catch(PDOException $e){
    echo "Failed";
}


?>
