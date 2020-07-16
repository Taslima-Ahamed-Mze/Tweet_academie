<?php
session_start();
include('../inscription_connexion/connexion_bdd.php');

$id_tweet=$_GET['id_tweet'];

$requete = $bdd->query("SELECT * FROM tweet INNER JOIN user ON user.id_user = tweet.id_autor WHERE id_tweet=".$id_tweet);
while($donnees = $requete->fetch()){
    $new_string=$donnees['content_tweet'];
    if($donnees['url_image']!=""){

            
        $array = explode(' ', $donnees['content_tweet']);
        for($y=0 ; $y < count($array) ; $y++){

            if (substr($array[$y], 0, 1) === "#"){
                $array[$y]= "<a href='".$array[$y]."'>".$array[$y]."</a>";

                $new_string= implode(' ', $array);
    
            }


            if (substr($array[$y], 0, 1) === "@"){
                $array[$y]= "<a href='".$array[$y]."'>".$array[$y]."</a>";

                $new_string= implode(' ', $array);
    
            }
        }     
                    
                
                $recup_tweet = 
                '<div class="new_tweet" style="border:0px;">' .
                    '<div class="mini_photo_profil" style="background-image: url(\'profil/image/'. $donnees['profile_picture'] .'\');"></div>' . 
                        '<div class="titre_contenu_tweet">'.
                            
                            '<p>' .
                                '<span class="p_nom_tweet">'.'<b>'. $donnees['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees['pseudo'] .' - '. $donnees['tweet_date'] . '</span></span>' .
                                '<br>' .
                                '<span class="contenu_tweet">' .
                                    $new_string.
                                '</span>' .
                                '<div class="div_img_tweet_rep" style="background-image: url(\'tweet/image/'. $donnees['url_image'] .'\');"></div>' .
                            '</p>' .

                        '</div>' .
                    '</div>' .
                '</div>';

            }


            if($donnees['url_image']==""){
                $new_string=$donnees['content_tweet'];

                $array = explode(' ', $donnees['content_tweet']);
                for($y=0 ; $y < count($array) ; $y++){

                    if (substr($array[$y], 0, 1) === "#"){
                        $array[$y]= "<a href='".$array[$y]."'>".$array[$y]."</a>";
        
                        $new_string= implode(' ', $array);
            
                    }

                    if (substr($array[$y], 0, 1) === "@"){
                        $array[$y]= "<a href='".$array[$y]."'>".$array[$y]."</a>";
        
                        $new_string= implode(' ', $array);
            
                    }
                } 


                $recup_tweet = 
                '<div class="new_tweet" style="border:0px;">' .
                    '<div class="mini_photo_profil" style="background-image: url(\'profil/image/'. $donnees['profile_picture'] .'\');"></div>' . 
                        '<div class="titre_contenu_tweet">'.
                            
                            '<p>' .
                                '<span class="p_nom_tweet">'.'<b>'. $donnees['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees['pseudo'] .' - '. $donnees['tweet_date'] . '</span></span>' .
                                '<br>' .
                                '<span class="contenu_tweet">' .
                                    $new_string .   
                                '</span>' .
                                '<div class=\"div_img_tweet\" style="background-image: url(\'tweet/image/'. $donnees['url_image'] .'\');"></div>' .
                            '</p>' .

                        '</div>' .
                    '</div>' .
                '</div>';
            }

        }
    
    echo $recup_tweet;



?>
