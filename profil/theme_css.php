<?php
session_start();
include('../inscription_connexion/connexion_bdd.php');
$id = $_SESSION['id'];
$theme=$_POST['theme'];

$_SESSION['theme']=$theme;

if ($theme == 1) {
    $bdd->query("UPDATE user SET theme = 1  WHERE id_user = $id ");
}

if ($theme == 2) {
    $bdd->query("UPDATE user SET theme = 2  WHERE id_user = $id ");
}


