<?php
session_start();
require_once '../inscription_connexion/connexion_bdd.php';
$id_follower = $_SESSION['id'];  
if($_POST['action'] == 'fetch_user')
{
    $output ="";

    $hashtag = strpos($_POST['search'],'#');
    $membre = strpos($_POST['search'],'@');
    if($hashtag!==false)
    {
        $hashtag++;
        $name = substr($_POST['search'],$hashtag);
        $data1 = $bdd->query("SELECT * FROM tweet INNER JOIN user ON tweet.id_autor = user.id_user WHERE content_tweet LIKE '%$name%' AND id_user !=".$_SESSION['id']) or die("failed");
        foreach($data1 as $result)
        {
            $new_string_rep = $result['content_tweet'];

            $array_rep = explode(' ', $result['content_tweet']);
            for($y_rep=0 ; $y_rep < count($array_rep) ; $y_rep++){

                if (substr($array_rep[$y_rep], 0, 1) === "#"){
                    $array_rep[$y_rep]= "<a href='".$array_rep[$y_rep]."'>".$array_rep[$y_rep]."</a>";
    
                    $new_string_rep= implode(' ', $array_rep);
                    //print_r($donnees_rep);
        
                }

                if (substr($array_rep[$y_rep], 0, 1) === "@"){
                    $array_rep[$y_rep]= "<a href='".$array_rep[$y_rep]."'>".$array_rep[$y_rep]."</a>";
    
                    $new_string_rep= implode(' ', $array_rep);
                    //print_r($donnees_rep);
        
                }
            }     

            $output .= '<div class="new_tweet">
            <div class="mini_photo_profil_session"></div>  
                <div class="titre_contenu_tweet">
                     
                    <p>
                    <span class="p_nom_tweet"><b>'.$result['name'].'</b><span style="color:grey;">@'.$result['pseudo'].' - '.$result['tweet_date'].'</span></span>
                        <br>
                        <span class="contenu_tweet">'.$new_string_rep. 
                        '</span>
                        <div class=\"div_img_tweet\" style="background-image: url(\'tweet/image/'.$result['url_image'].'\');"></div>
                    </p>

                    <div class="buttons_tweet">
                        <button class="button_reaction_tweet"><i class="far fa-heart"></i></button>
                        <button class="button_reaction_tweet" id="comment"><i class="far fa-comment"></i></button>
                        <button class="button_reaction_tweet"><i class="fas fa-retweet"></i></button>
                    </div>

                </div>
            </div>
        </div>';
        } 
    }
    elseif($membre!==false)
    {
        $membre++;
        $name = substr($_POST['search'],$membre);
        $data = $bdd->query("SELECT * FROM user WHERE pseudo LIKE '%$name%' AND id_user !=".$_SESSION['id']) or die("failed");
       
        foreach($data as $row)
        {
            $id_followed  = $row['id_user'];
            $data3 = $bdd->query("SELECT * FROM follow WHERE id_follower=$id_follower AND id_followed='".$id_followed."'");
            $out = '';
            if($data3->fetchColumn() > 0)
            {
                $out = '<button type="button" name="follow_button" class="btn btn-warning action_button" data-action="unfollow" data-id_followed="'.$id_followed.'">Unfollow</button>';
            }
            else
            {
                $out = '<button type="button" name="follow_button" class="btn btn-info action_button" data-action="follow" data-id_followed="'.$id_followed.'"><i class="glyphicon-plus"></i> Follow</button>';
            }

            $output .= '<div class="following">
            <div class="following_profil">
            <div class="mini_photo_profil" style="background-image: url(../koum/profil/image/'.$row["profile_picture"].')"></div>
                <div class="following_profil_info">
                    <div class="following_profil_name">
                    <a href="search_profil.php?id='.$row['id_user'].'" class="link_profil"><span class="nom">'.$row["surname"]. ' ' .$row["name"].'</span></a>
                        <span class="pseudo"> @ '.$row["pseudo"].'</span>
                    </div>
                    <div class="following_button">
                       '.$out.'
                    </div>
                </div>
            </div>
            <div class="following_bio">
                <p class="bio">'.$row["bio"].'</p>
            </div>
            </div>';
        }
        
    }
    echo $output;
     
}


if($_POST['action'] == 'follow')
{
    $nbr_follow = 0;
    $nbr_abo = 0;
    $id_followed = $_POST['id_followed'];
    $bdd->query("INSERT INTO follow (id_follower,id_followed) VALUES ($id_follower,$id_followed)");
    
    $followers = $bdd->query("SELECT * FROM follow WHERE id_followed=".$_SESSION['id']) or die("failed");
    foreach($followers as $dataf)
    {
        $nbr_follow++;
    }
    $bonnements = $bdd->query("SELECT * FROM follow WHERE id_follower=".$_SESSION['id']) or die("failed");
    foreach($bonnements as $datab)
    {
        $nbr_abo++;
    }
    $_SESSION['nbr_followers'] = $nbr_follow;
    $_SESSION['nbr_abonnements'] = $nbr_abo;
    echo $output;
}
elseif($_POST['action'] == 'unfollow')
{
    
    $nbr_follow = 0;
    $nbr_abo = 0;
    $id_followed = $_POST['id_followed'];
    $bdd->query("DELETE FROM follow WHERE id_follower=$id_follower AND id_followed=$id_followed");
    $followers = $bdd->query("SELECT * FROM follow WHERE id_followed=".$_SESSION['id']) or die("failed");
    foreach($followers as $dataf)
    {
        $nbr_follow++;
    }
    
    $bonnements = $bdd->query("SELECT * FROM follow WHERE id_follower=".$_SESSION['id']) or die("failed");
    foreach($bonnements as $datab)
    {
        $nbr_abo++;
    }
    
    $_SESSION['nbr_followers'] = $nbr_follow;
    $_SESSION['nbr_abonnements'] = $nbr_abo;
    echo $output;
}
            
        
    





?>


