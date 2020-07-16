<?php
session_start();
require_once('connexion_bdd.php');
    
    $bdd->exec("UPDATE user SET theme = 42 WHERE id_user =".$_SESSION['id']) or die('failed');

header('Location: index.php');
?>