<?php
session_start();
include('../inscription_connexion/connexion_bdd.php');

$id_user=$_SESSION['id'];

//RECUP ABONNEMENTS
$requete = $bdd->query("SELECT * FROM follow WHERE id_follower=$id_user");
$liste_abo =array();
while($donnees = $requete->fetch()){
    array_push($liste_abo, $donnees['id_followed']);
}


//RECUP TWEET DES ABONNEMENTS
$liste_tweet=array();
for($i=0 ; $i < count($liste_abo) ; $i++){

    $id_abo=$liste_abo[$i];

    $requete = $bdd->query("SELECT * FROM tweet INNER JOIN user ON user.id_user = tweet.id_autor WHERE id_autor=$id_abo OR id_autor=$id_user");
    while($donnees = $requete->fetch()){
        array_push($liste_tweet, $donnees['id_tweet']);
    }
}
$tweet=(array_unique($liste_tweet));


$id_div=0;
$fil_actu="";
for($i=0 ; $i < count($tweet) ; $i++){

    $requete = $bdd->query("SELECT * FROM tweet INNER JOIN user ON user.id_user = tweet.id_autor WHERE id_tweet=".$tweet[$i]);
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
            
            $like=0;
            $requete_like = $bdd->query("SELECT * FROM `like`WHERE id_user= ".$_SESSION['id']." AND id_tweet=".$tweet[$i]);
                while($donnees_like = $requete_like->fetch()){
                    $like++;
                }
            
            if($like==0){
                $button_like='<button class="button_reaction_tweet"  onclick="like('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-heart"></i></button>';
            }
            else{
                $button_like='<button class="button_reaction_tweet"  onclick="like('.$donnees['id_tweet'].', ' . $id_div.')"><i class="fas fa-heart"></i></button>';
            }
            
            $fil_actu .= 
            '<div class="new_tweet">' . 
                '<div class="mini_photo_profil" style="background-image: url(\'profil/image/'. $donnees['profile_picture'] .'\');"></div>' . 
                    '<div class="titre_contenu_tweet">'.
                        
                        '<p>' . 
                            '<a href="search_profil.php?id='. $donnees['id_user'] .'">'.'<span class="p_nom_tweet">'.'<b>'. $donnees['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees['pseudo'] .'</a>' . ' - '. $donnees['tweet_date'] . '</span></span>' .
                            '<br>' .
                            '<span class="contenu_tweet">' .
                                $new_string.
                            '</span>' .
                            '<div class="div_img_tweet" style="background-image: url(\'tweet/image/'. $donnees['url_image'] .'\');"></div>' .
                        '</p>' .

                        '<div class="buttons_tweet">' .
                            $button_like .
                            '<button class="button_reaction_tweet" data-toggle="modal" data-target="#modalComment" onclick="comment('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-comment"></i></button>' .
                            '<button class="button_reaction_tweet" data-toggle="modal" data-target="#modalRetweet" onclick="retweet('.$donnees['id_tweet'].', ' . $id_div.')"><i class="fas fa-retweet"></i></button>' .
                        '</div>' .

                    '</div>' .
                '</div>' .
            '</div>';


            $id_div++;

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


            


            //COMMENTAIRE
            if($donnees['id_rep']!=""){
                $tweet_base="";
                $id_rep=$donnees['id_rep'];
                $new_string_rep="";

                $requete_rep = $bdd->query("SELECT * FROM tweet INNER JOIN user ON user.id_user = tweet.id_autor WHERE id_tweet=".$id_rep);
                while($donnees_rep = $requete_rep->fetch()){

                    $new_string_rep = $donnees_rep['content_tweet'];

                    $array_rep = explode(' ', $donnees_rep['content_tweet']);
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
                        

                    if($donnees_rep['url_image']!=""){
                        
                    
                        $tweet_base= 
                        '<div class="new_tweet" style="padding:10px; margin-right:10px;">' .
                            '<div class="mini_photo_profil" style="background-image: url(\'profil/image/'. $donnees_rep['profile_picture'] .'\');"></div>' . 
                                '<div class="titre_contenu_tweet">'.
                                    
                                    '<p>' . 
                                    '<a href="search_profil.php?id='. $donnees['id_user'] .'">'.'<span class="p_nom_tweet">'.'<b>'. $donnees_rep['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees_rep['pseudo'] .'</a> - '. $donnees_rep['tweet_date'] . '</span></span>' .
                                        
                                        '<br>' .

                                        '<span class="contenu_tweet">' .
                                            $new_string_rep .
                                        '</span>' .
                                        '<div class="div_img_tweet" style=" width:350px; background-image: url(\'tweet/image/'. $donnees_rep['url_image'] .'\');"></div>' .
                                    '</p>' .

                                    '<div>' .
                                        '<a href="">Voir la publication originale</a>' .
                                    '</div>' .

                                '</div>' .
                            '</div>' .
                        '</div>';
                    }
                    else{

                        $tweet_base= 
                        '<div class="new_tweet" style="padding:10px; margin-right:10px;">' .
                            '<div class="mini_photo_profil" style="background-image: url(\'profil/image/'. $donnees_rep['profile_picture'] .'\');"></div>' . 
                                '<div class="titre_contenu_tweet">'.
                                    
                                    '<p>' .
                                    '<a href="search_profil.php?id='. $donnees['id_user'] .'">'.'<span class="p_nom_tweet">'.'<b>'. $donnees_rep['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees_rep['pseudo'] .'</a> - '. $donnees_rep['tweet_date'] . '</span></span>' .
                                        
                                        '<br>' .

                                        '<span class="contenu_tweet">' .
                                            $new_string_rep .
                                        '</span>' .
                                    '</p>' .

                                    '<div>' .
                                        '<a href="">Voir la publication d\'origine</a>' .
                                    '</div>' .

                                '</div>' .
                            '</div>' .
                        '</div>';

                    }

                }

                $like=0;
                $requete_like = $bdd->query("SELECT * FROM `like`WHERE id_user= ".$_SESSION['id']." AND id_tweet=".$tweet[$i]);
                    while($donnees_like = $requete_like->fetch()){
                        $like++;
                    }
                
                if($like==0){
                    $button_like='<button class="button_reaction_tweet"  onclick="like('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-heart"></i></button>';
                }
                else{
                    $button_like='<button class="button_reaction_tweet"  onclick="like('.$donnees['id_tweet'].', ' . $id_div.')"><i class="fas fa-heart"></i></button>';
                }

                $fil_actu .= 
                '<div class="new_tweet" >' .

                    '<div style="display:flex; flex-direction:column; width :100%;">' .

                        '<div style="display:flex;">' .
                            '<div class="mini_photo_profil" style="background-image: url(\'profil/image/'. $donnees['profile_picture'] .'\');"></div>' . 

                            '<div class="titre_contenu_tweet" style="width:80%;>'.
                                '<p>' . 
                                '<a href="search_profil.php?id='. $donnees['id_user'] .'">'.'<span class="p_nom_tweet">'.'<b>'. $donnees['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees['pseudo'] .'</a> - '. $donnees['tweet_date'] . '</span></span>' .
                                    '<br>' .
                                    '<span class="contenu_tweet">' .
                                        $new_string .   
                                    '</span>' .
                                '</p>' .

                                '<div class="tweet_base">' .
                                    $tweet_base .
                                '</div>' .
            
                            '</div>' .

                            '<div class="buttons_tweet">' .
                                $button_like .
                                '<button class="button_reaction_tweet" data-toggle="modal" data-target="#modalComment" onclick="comment('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-comment"></i></button>' .
                                '<button class="button_reaction_tweet" data-toggle="modal" data-target="#modalRetweet" onclick="retweet('.$donnees['id_tweet'].', ' . $id_div.')"><i class="fas fa-retweet"></i></button>' .
                            '</div>' .

        
                            
                            
                        '</div>' .

                    '</div>' .
                '</div>';
                $id_div++;
            }



            //RETWEET
            if($donnees['id_retweet']!=""){
                $tweet_base="";
                $id_retweet=$donnees['id_retweet'];
                $new_string_rep="";

                $requete_rep = $bdd->query("SELECT * FROM tweet INNER JOIN user ON user.id_user = tweet.id_autor WHERE id_tweet=".$id_retweet);
                while($donnees_rep = $requete_rep->fetch()){

                    $new_string_rep = $donnees_rep['content_tweet'];

                    $array_rep = explode(' ', $donnees_rep['content_tweet']);
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

                    $intro_retweet= "Prenom @pseudo à retweeté :";

                    if($donnees_rep['url_image']!=""){
                    
                        $tweet_base= 
                        '<div class="new_tweet" style="padding:10px; margin-right:10px;">' .
                            '<div class="mini_photo_profil" style="background-image: url(\'profil/image/'. $donnees_rep['profile_picture'] .'\');"></div>' . 
                                '<div class="titre_contenu_tweet">'.
                                    
                                    '<p>' .
                                    '<a href="search_profil.php?id='. $donnees['id_user'] .'">'.'<span class="p_nom_tweet">'.'<b>'. $donnees_rep['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees_rep['pseudo'] .'</a> - '. $donnees_rep['tweet_date'] . '</span></span>' .
                                        
                                        '<br>' .

                                        '<span class="contenu_tweet">' .
                                            $new_string_rep .
                                        '</span>' .
                                        '<div class="div_img_tweet" style=" width:350px; background-image: url(\'tweet/image/'. $donnees_rep['url_image'] .'\');"></div>' .
                                    '</p>' .

                                    '<div>' .
                                        '<a href="">Voir la publication d\'origine</a>' .
                                    '</div>' .

                                '</div>' .
                            '</div>' .
                        '</div>';
                    }
                    else{

                        $tweet_base= 
                        '<div class="new_tweet" style="padding:10px; margin-right:10px;">' .
                            '<div class="mini_photo_profil" style="background-image: url(\'profil/image/'. $donnees_rep['profile_picture'] .'\');"></div>' . 
                                '<div class="titre_contenu_tweet">'.
                                    
                                    '<p>' .
                                    '<a href="search_profil.php?id='. $donnees['id_user'] .'">'.'<span class="p_nom_tweet">'.'<b>'. $donnees_rep['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees_rep['pseudo'] .'</a> - '. $donnees_rep['tweet_date'] . '</span></span>' .
                                        
                                        '<br>' .

                                        '<span class="contenu_tweet">' .
                                            $new_string_rep .
                                        '</span>' .
                                    '</p>' .

                                    '<div>' .
                                        '<a href="">Voir la publication d\'origine</a>' .
                                    '</div>' .

                                '</div>' .
                            '</div>' .
                        '</div>';

                    }

                }

                $like=0;
                $requete_like = $bdd->query("SELECT * FROM `like`WHERE id_user= ".$_SESSION['id']." AND id_tweet=".$tweet[$i]);
                    while($donnees_like = $requete_like->fetch()){
                        $like++;
                    }
                
                if($like==0){
                    $button_like='<button class="button_reaction_tweet"  onclick="like('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-heart"></i></button>';
                }
                else{
                    $button_like='<button class="button_reaction_tweet"  onclick="like('.$donnees['id_tweet'].', ' . $id_div.')"><i class="fas fa-heart"></i></button>';
                }

                
                $fil_actu .= 
                '<div class="new_tweet">' .

                    '<div style="display:flex; flex-direction:column; width :100%;">' .

                        '<div style="display:flex;">' .
                           

                            '<div class="titre_contenu_tweet" style="width:90%;>'.
                                '<p>' .
                                    '<span class="p_nom_tweet">'. '<a href="search_profil.php?pseudo='. $donnees['pseudo'] .'">'.'<b>'. $donnees['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees['pseudo'] .'</a>' . ' a retweeté : '. '</span></span>' .
                                    '<br>' .
                                '</p>' . 

                                '<div class="tweet_base">' .
                                    $tweet_base .
                                '</div>' .
            
                            '</div>' .

                            '<p style="color:grey; text-align:right; width:90%; font-size:12px;">' . 'le ' . $donnees['tweet_date'] . '</p>' .

                            '<div class="buttons_tweet">' .
                                $button_like .
                                '<button class="button_reaction_tweet" data-toggle="modal" data-target="#modalComment" onclick="comment('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-comment"></i></button>' .
                                '<button class="button_reaction_tweet" data-toggle="modal" data-target="#modalRetweet" onclick="retweet('.$donnees['id_tweet'].', ' . $id_div.')"><i class="fas fa-retweet"></i></button>' .
                            '</div>' .

        
                            
                            
                        '</div>' .

                    '</div>' .
                '</div>';
                $id_div++;

            }

            elseif($donnees['id_rep'] == ""){

                $like=0;
                $requete_like = $bdd->query("SELECT * FROM `like`WHERE id_user= ".$_SESSION['id']." AND id_tweet=".$tweet[$i]);
                    while($donnees_like = $requete_like->fetch()){
                        $like++;
                    }
                
                if($like==0){
                    $button_like='<button class="button_reaction_tweet"  onclick="like('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-heart"></i></button>';
                }
                else{
                    $button_like='<button class="button_reaction_tweet"  onclick="like('.$donnees['id_tweet'].', ' . $id_div.')"><i class="fas fa-heart"></i></button>';
                }


                $fil_actu .= 
                '<div class="new_tweet">' .
                    '<div class="mini_photo_profil" style="background-image: url(\'profil/image/'. $donnees['profile_picture'] .'\');"></div>' . 
                        '<div class="titre_contenu_tweet">'.
                            
                            '<p>' .
                            '<a href="search_profil.php?id='. $donnees['id_user'] .'">'.'<span class="p_nom_tweet">'.'<b>'. $donnees['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees['pseudo'] .'</a> - '. $donnees['tweet_date'] . '</span></span>' .
                                '<br>' .
                                '<span class="contenu_tweet">' .
                                    $new_string .   
                                '</span>' .
                            '</p>' .

                            '<div class="buttons_tweet">' .
                                $button_like .
                                '<button class="button_reaction_tweet" data-toggle="modal" data-target="#modalComment" onclick="comment('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-comment"></i></button>' .
                                '<button class="button_reaction_tweet" data-toggle="modal" data-target="#modalRetweet" onclick="retweet('.$donnees['id_tweet'].', ' . $id_div.')"><i class="fas fa-retweet"></i></button>' .
                            '</div>' .

                        '</div>' .
                    '</div>' .
                '</div>';
                $id_div++;
            }

        }

    }
}

echo $fil_actu;



?>
