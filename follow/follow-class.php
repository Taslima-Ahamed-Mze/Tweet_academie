<?php
session_start();
require_once('../inscription_connexion/connexion_bdd.php');

        $output = "";
        if($_POST['action'] == "unfollow_membre") 
        {
            
            
            $query_Following = $bdd->prepare('SELECT * FROM user INNER JOIN follow ON user.id_user = follow.id_followed WHERE id_follower = ?');
            $query_Following->execute(array(
                $_SESSION["id"],
            ));

            foreach ($query_Following as $following) {
                $output .= '<div class="following">
                        <div class="following_profil">
                        <div class="mini_photo_profil" style="background-image: url(profil/image/'.$following["profile_picture"].')"></div>
                            <div class="following_profil_info">
                                <div class="following_profil_name">
                                    <span class="nom">'.$following["surname"]. ' ' .$following["name"].'</span>
                                    <span class="pseudo"> @ '.$following["pseudo"].'</span>
                                </div>
                                <div class="following_button">
                                <button type="button" name="follow_button" class="btn btn-info action_button" data-action="unfollow" data-id_followed="'.$following["id_user"].'"><i class="glyphicon-plus"></i> Unfollow</button>

                                </div>
                            </div>
                        </div>
                        <div class="following_bio">
                            <p class="bio">'.$following["bio"].'</p>
                        </div>
                    </div>';
            }
            echo $output;
            
        }
        if($_POST['action'] == 'unfollow')
        {
            
            $nbr_follow = 0;
            $nbr_abo = 0;
            $id_followed = $_POST['id_followed'];
            $bdd->query("DELETE FROM follow WHERE id_followed=$id_followed AND id_follower=".$_SESSION['id']);
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
        
        $out = "";
        if($_POST['action'] == "followers")
        {
            
            $query_Followers = $bdd->prepare('SELECT * FROM user INNER JOIN follow ON user.id_user = follow.id_follower WHERE id_followed = ?');
            $query_Followers->execute(array(
                $_SESSION["id"],
            ));

            foreach ($query_Followers as $following)
            {
                $out .= '<div class="following">
                        <div class="following_profil">
                        <div class="mini_photo_profil" style="background-image: url(profil/image/'.$following["profile_picture"].')"></div>
                            <div class="following_profil_info">
                                <div class="following_profil_name">
                                    <span class="nom">'.$following["surname"]. ' ' .$following["name"].'</span>
                                    <span class="pseudo"> @ '.$following["pseudo"].'</span>
                                </div>
                            </div>
                        </div>
                        <div class="following_bio">
                            <p class="bio">'.$following["bio"].'</p>
                        </div>
                    </div>';
            }
            echo $out;
        }
        

?>

