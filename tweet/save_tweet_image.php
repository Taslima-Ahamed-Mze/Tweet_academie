<?php
session_start();

$message=strip_tags($_POST['message']);
$id_auteur=$_SESSION['id'];
$id_tweet=0;
$uploads_dir = './image';

foreach ($_FILES as $chem){
    echo $name=$chem['name'];
    move_uploaded_file($chem["tmp_name"],"$uploads_dir/".$chem['name']);
}

?>
