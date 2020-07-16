<?php 

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
                                        '<span class="p_nom_tweet">'.'<b>'. $donnees_rep['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees_rep['pseudo'] .' - '. $donnees_rep['tweet_date'] . '</span></span>' .
                                        
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
                                        '<span class="p_nom_tweet">'.'<b>'. $donnees_rep['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees_rep['pseudo'] .' - '. $donnees_rep['tweet_date'] . '</span></span>' .
                                        
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
                           

                            '<div class="titre_contenu_tweet" style="width:90%;>'.
                                '<p>' .
                                    '<span class="p_nom_tweet">'.'<b>'. $donnees['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees['pseudo'] .' a retweeté : '. '</span></span>' .
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