<?php
session_start();
require_once('../inscription_connexion/connexion_bdd.php');

    $output = "";
    if($_POST['action'] == "hashtag")
    {
        $data = $bdd->query("SELECT * FROM tweet INNER JOIN user ON user.id_user = tweet.id_autor ORDER BY id_tweet DESC");
        foreach($data as $row)
        {
            if(strpos($row['content_tweet'],'#') !== false)
            {
                $tab = explode(' ',$row['content_tweet']);
                foreach($tab as $elmts)
                {
                    if(substr($elmts,0,1) =='#')
                    {
                        $hashtag = $elmts;
                    }
                }
                
                $nbr = 0;
                $sql = $bdd->query("SELECT * FROM tweet_tag WHERE hashtag='".$hashtag."'");
                
                foreach($sql as $rows)
                {
                    $nbr++;
                }
                if($row['url_image']!=null)
                {

                    $new_string_rep = $row['content_tweet'];

                    $array_rep = explode(' ', $row['content_tweet']);
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
              
                    <div class="titre_contenu_tweet">
                        
                        <p>' .
                        '<a href="search_profil.php?pseudo='. $row['pseudo'] .'">'.'<span class="p_nom_tweet">'.'<b>'. $row['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $row['pseudo'] .'</a> - '. $row['tweet_date'] . '</span></span>' .
                            '<br>
                            <span class="contenu_tweet">'.$new_string_rep. 
                            '</span>
                           
                            <span class="contenu_tweet">'.$nbr. 
                            ' Tweets</span>
                        </p>
                        </div>
                    </div>
                    </div>';
                }else{

                    $new_string_rep = $row['content_tweet'];

                    $array_rep = explode(' ', $row['content_tweet']);
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
              
                    <div class="titre_contenu_tweet">
                        
                        <p>' .
                        '<a href="search_profil.php?pseudo='. $row['pseudo'] .'">'.'<span class="p_nom_tweet">'.'<b>'. $row['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $row['pseudo'] .'</a> - '. $row['tweet_date'] . '</span></span>' .                           
                         '<br>
                            <span class="contenu_tweet">'.$new_string_rep. 
                            '</span><br>
                            <span class="contenu_tweet">'.$nbr. 
                            ' Tweets</span>
                        </p>
                        </div>
                    </div>
                    </div>';
                }

                
            }
            else{
                if($row['url_image']!=null)
                {
                    $new_string_rep = $row['content_tweet'];

                    $array_rep = explode(' ', $row['content_tweet']);
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
              
                    <div class="titre_contenu_tweet">
                        
                        <p>' .
                        '<a href="search_profil.php?pseudo='. $row['pseudo'] .'">'.'<span class="p_nom_tweet">'.'<b>'. $row['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $row['pseudo'] .'</a> - '. $row['tweet_date'] . '</span></span>' .
                            '<br>
                            <span class="contenu_tweet">'.$row['content_tweet'].
                            '</span>
                            
                            <div class="div_img_tweet" style="width:350px; background-image: url(\'tweet/image/'. $row['url_image'] .'\');"></div>
            
                        </p>
                        </div>
                    </div>
                    </div>';
                }else{
                    $output .= '<div class="new_tweet">
              
                    <div class="titre_contenu_tweet">
                        
                        <p>' .
                        '<a href="search_profil.php?pseudo='. $row['pseudo'] .'">'.'<span class="p_nom_tweet">'.'<b>'. $row['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $row['pseudo'] .'</a> - '. $row['tweet_date'] . '</span></span>' .
                            '<br>
                            <span class="contenu_tweet">'.$row['content_tweet']. 
                            '</span>
                            
                        </p>
                        </div>
                    </div>
                    </div>';
                }
            }
           
           
           

           
        }
        echo $output;
    }










?>