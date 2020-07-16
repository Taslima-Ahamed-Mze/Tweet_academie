<?php
session_start();

//$bdd = new PDO('mysql:host=localhost;dbname=common-database;charset=utf8', 'root', '');
include('../inscription_connexion/connexion_bdd.php');

$message=strip_tags($_POST['message']);
$id_auteur=$_SESSION['id'];
$id_tweet=0;
$name=$_POST['img_name'];
$uploads_dir = './image';


try{

    $connexion = $bdd->query("INSERT INTO tweet(id_autor, id_tweet, tweet_date, content_tweet, url_image)
    VALUES ($id_auteur, $id_tweet, NOW(), '".$message."', '".$name."')");

    $array = explode(' ', $message);
    $tab_c = count($array);

    
    $i = 0;
    while ($i < $tab_c) 
    {
        if (substr($array[$i], 0, 1) === "#")
        {
            $hashtag = $array[$i];
            $id = $_SESSION['id'];
            
            $array[$i]= "<a href='".$array[$i]."'>".$array[$i]."</a>";

            $connexion= $bdd->query("INSERT INTO tweet_tag(id_member, hashtag) VALUES($id, '".$hashtag."')");
        }
        if (substr($array[$i], 0, 1) === "@")
        {
            $array[$i]= "<a href='".$array[$i]."'>".$array[$i]."</a>";
            //$connexion= $bdd->query("INSERT INTO tweet_tag(id_member, hashtag) VALUES($id, '".$hashtag."')");
        }

        $i++;

    }
    $new_string= implode(' ', $array);
    echo $new_string;

}
catch(PDOException $e){
    echo "Failed";
}
?>
