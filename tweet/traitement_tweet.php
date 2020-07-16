<?php
session_start();

include('../inscription_connexion/connexion_bdd.php');

$message=strip_tags($_POST['message']);
$id_auteur=$_SESSION['id'];
$id_tweet=0;

$id_rep="";

//echo $_POST['id_tweet_rep'];


try{

    if (isset($_POST['id_tweet_rep'])){
        $id_rep=$_POST['id_tweet_rep'];
  
        $connexion = $bdd->query("INSERT INTO tweet(id_autor, id_tweet, tweet_date, content_tweet, id_rep)
        VALUES ($id_auteur, $id_tweet, NOW(), '".$message."', ".$id_rep.")");
    }
    elseif (isset($_POST['id_retweet'])){
        $id_retweet=$_POST['id_retweet'];
        $message="";

        $connexion = $bdd->query("INSERT INTO tweet(id_autor, id_tweet, tweet_date, content_tweet, id_retweet)
        VALUES ($id_auteur, $id_tweet, NOW(), '".$message."', ".$id_retweet.")");
    }
    else{
        $connexion = $bdd->query("INSERT INTO tweet(id_autor, id_tweet, tweet_date, content_tweet)
        VALUES ($id_auteur, $id_tweet, NOW(), '".$message."')");
    }

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

            $connexion = $bdd->query("INSERT INTO tweet_tag(id_member, hashtag) VALUES($id, '".$hashtag."')");
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
