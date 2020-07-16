<?php
session_start();
require_once('../inscription_connexion/class-connexion.php');

class User {

    public function __construct()
    {
        $this->pdo = DatabaseConnection::getInstance()->handle();
    }

    public function getTweet()
    { 
        $member = $_POST['member'];
        $id_member = $_POST['id_member'];
       
        if(!empty($member)){
            $query_getTweet = $this->pdo->query('SELECT * FROM tweet INNER JOIN user ON tweet.id_autor = user.id_user WHERE id_autor = '.$id_member.'');
        }
        else {
            $query_getTweet = $this->pdo->query('SELECT * FROM tweet INNER JOIN user ON tweet.id_autor = user.id_user WHERE id_autor = '.$_SESSION["id"].'');
        }

        $id_div=0;
        $fil_actu="";
        while($donnees = $query_getTweet->fetch()) {
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
                    
                
                $fil_actu .= 
                '<div class="new_tweet">' .
                    '<div class="mini_photo_profil" style="background-image: url(\'profil/image/'. $donnees['profile_picture'] .'\');"></div>' . 
                        '<div class="titre_contenu_tweet">'.
                            
                            '<p>' .
                                '<span class="p_nom_tweet">'.'<b>'. $donnees['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees['pseudo'] .' - '. $donnees['tweet_date'] . '</span></span>' .
                                '<br>' .
                                '<span class="contenu_tweet">' .
                                    $new_string.
                                '</span>' .
                                '<div class="div_img_tweet" style="background-image: url(\'tweet/image/'. $donnees['url_image'] .'\');"></div>' .
                            '</p>' .
    
                            '<div class="buttons_tweet">' .
                                '<button class="button_reaction_tweet"  onclick="like('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-heart"></i></button>' .
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
    
    
                
    
    
    
                if($donnees['id_rep']!=""){
                    $tweet_base="";
                    $id_rep=$donnees['id_rep'];
                    $new_string_rep="";
    
                    $requete_rep = $this->pdo->query("SELECT * FROM tweet INNER JOIN user ON user.id_user = tweet.id_autor WHERE id_tweet=".$id_rep);
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
                                            '<span class="p_nom_tweet">'.'<b>'. $donnees_rep['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees_rep['pseudo'] .' - '. $donnees_rep['tweet_date'] . '</span></span>' .
                                            
                                            '<br>' .
    
                                            '<span class="contenu_tweet">' .
                                                $new_string_rep .
                                            '</span>' .
                                            '<div class="div_img_tweet" style=" width:; background-image: url(\'tweet/image/'. $donnees_rep['url_image'] .'\');"></div>' .
                                        '</p>' .
    
                                        '<div class="buttons_tweet">' .
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
    
                    $fil_actu .= 
                    '<div class="new_tweet" >' .
    
                        '<div style="display:flex; flex-direction:column; width :100%;">' .
    
                            '<div style="display:flex;">' .
                                '<div class="mini_photo_profil" style="background-image: url(\'profil/image/'. $donnees['profile_picture'] .'\');"></div>' . 
    
                                '<div class="titre_contenu_tweet" style="width:80%;>'.
                                    '<p>' .
                                        '<span class="p_nom_tweet">'.'<b>'. $donnees['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees['pseudo'] .' - '. $donnees['tweet_date'] . '</span></span>' .
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
                                    '<button class="button_reaction_tweet"  onclick="like('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-heart"></i></button>' .
                                    '<button class="button_reaction_tweet" data-toggle="modal" data-target="#modalComment" onclick="comment('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-comment"></i></button>' .
                                    '<button class="button_reaction_tweet" data-toggle="modal" data-target="#modalRetweet" onclick="retweet('.$donnees['id_tweet'].', ' . $id_div.')"><i class="fas fa-retweet"></i></button>' .
                                '</div>' .
    
            
                                
                                
                            '</div>' .
    
                        '</div>' .
                    '</div>';
                    $id_div++;
                }
    
    
    
                if($donnees['id_retweet']!=""){
                    $tweet_base="";
                    $id_retweet=$donnees['id_retweet'];
                    $new_string_rep="";
    
                    $requete_rep = $this->pdo->query("SELECT * FROM tweet INNER JOIN user ON user.id_user = tweet.id_autor WHERE id_tweet=".$id_retweet);
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
    
                        $intro_retweet = "Prenom @pseudo à retweeté :";
    
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
                                            '<div class="div_img_tweet" style=" width:; background-image: url(\'tweet/image/'. $donnees_rep['url_image'] .'\');"></div>' .
                                        '</p>' .
    
                                        '<div class="buttons_tweet">' .
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
                                    '<button class="button_reaction_tweet"  onclick="like('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-heart"></i></button>' .
                                    '<button class="button_reaction_tweet" data-toggle="modal" data-target="#modalComment" onclick="comment('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-comment"></i></button>' .
                                    '<button class="button_reaction_tweet" data-toggle="modal" data-target="#modalRetweet" onclick="retweet('.$donnees['id_tweet'].', ' . $id_div.')"><i class="fas fa-retweet"></i></button>' .
                                '</div>' .
    
            
                                
                                
                            '</div>' .
    
                        '</div>' .
                    '</div>';
                    $id_div++;
    
                }
    
                elseif($donnees['id_rep'] == ""){
    
                    $fil_actu .= 
                    '<div class="new_tweet">' .
                        '<div class="mini_photo_profil" style="background-image: url(\'profil/image/'. $donnees['profile_picture'] .'\');"></div>' . 
                            '<div class="titre_contenu_tweet">'.
                                
                                '<p>' .
                                    '<span class="p_nom_tweet">'.'<b>'. $donnees['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees['pseudo'] .' - '. $donnees['tweet_date'] . '</span></span>' .
                                    '<br>' .
                                    '<span class="contenu_tweet">' .
                                        $new_string .   
                                    '</span>' .
                                '</p>' .
    
                                '<div class="buttons_tweet">' .
                                    '<button class="button_reaction_tweet"  onclick="like('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-heart"></i></button>' .
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
    
    echo $fil_actu;
}    

    public function getReply()
    {
        $member = $_POST['member'];
        $id_member = $_POST['id_member'];
       
        if(!empty($member)){
            $query_getReply = $this->pdo->query('SELECT * FROM tweet INNER JOIN user ON tweet.id_autor = user.id_user WHERE id_autor = '.$id_member.'');
        }
        else {
            $query_getReply = $this->pdo->query('SELECT * FROM tweet INNER JOIN user ON tweet.id_autor = user.id_user WHERE id_autor = '.$_SESSION["id"].'');
        }

        $id_div=0;
        $fil_actu = "";
        foreach ($query_getReply as $donnees) {

            $new_string=$donnees['content_tweet'];

            if($donnees['id_rep']!=""){
                $tweet_base="";
                $id_rep=$donnees['id_rep'];
                $new_string_rep="";

                $requete_rep = $this->pdo->query("SELECT * FROM tweet INNER JOIN user ON user.id_user = tweet.id_autor WHERE id_tweet=".$id_rep);
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
                                        '<span class="p_nom_tweet">'.'<b>'. $donnees_rep['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees_rep['pseudo'] .' - '. $donnees_rep['tweet_date'] . '</span></span>' .
                                        
                                        '<br>' .

                                        '<span class="contenu_tweet">' .
                                            $new_string_rep .
                                        '</span>' .
                                        '<div class="div_img_tweet" style=" width:; background-image: url(\'tweet/image/'. $donnees_rep['url_image'] .'\');"></div>' .
                                    '</p>' .

                                    '<div class="buttons_tweet">' .
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

                $fil_actu .= 
                '<div class="new_tweet" >' .

                    '<div style="display:flex; flex-direction:column; width :100%;">' .

                        '<div style="display:flex;">' .
                            '<div class="mini_photo_profil" style="background-image: url(\'profil/image/'. $donnees['profile_picture'] .'\');"></div>' . 

                            '<div class="titre_contenu_tweet" style="width:80%;>'.
                                '<p>' .
                                    '<span class="p_nom_tweet">'.'<b>'. $donnees['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $donnees['pseudo'] .' - '. $donnees['tweet_date'] . '</span></span>' .
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
                                '<button class="button_reaction_tweet"  onclick="like('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-heart"></i></button>' .
                                '<button class="button_reaction_tweet" data-toggle="modal" data-target="#modalComment" onclick="comment('.$donnees['id_tweet'].', ' . $id_div.')"><i class="far fa-comment"></i></button>' .
                                '<button class="button_reaction_tweet" data-toggle="modal" data-target="#modalRetweet" onclick="retweet('.$donnees['id_tweet'].', ' . $id_div.')"><i class="fas fa-retweet"></i></button>' .
                            '</div>' .

        
                            
                            
                        '</div>' .

                    '</div>' .
                '</div>';
                $id_div++;
            }
        }

        echo $fil_actu;
    }


    public function getMedia()
    {
        $member = $_POST['member'];
        $id_member = $_POST['id_member'];
       
        if(!empty($member)){
            $query_getMedia = $this->pdo->query('SELECT * FROM tweet INNER JOIN user ON tweet.id_autor = user.id_user WHERE id_autor = '.$id_member.'');
        }
        else {
            $query_getMedia = $this->pdo->query('SELECT * FROM tweet INNER JOIN user ON tweet.id_autor = user.id_user WHERE id_autor = '.$_SESSION["id"].'');
        }

        $fil_actu = "";
        foreach ($query_getMedia as $tweets) {
            $new_string=$tweets['content_tweet'];


            if($tweets['url_image']!=""){

                
                $array = explode(' ', $tweets['content_tweet']);
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
                    
                
                $fil_actu .= 
                '<div class="new_tweet">' .
                    '<div class="mini_photo_profil" style="background-image: url(\'profil/image/'. $tweets['profile_picture'] .'\');"></div>' . 
                        '<div class="titre_contenu_tweet">'.
                            
                            '<p>' .
                                '<span class="p_nom_tweet">'.'<b>'. $tweets['surname'] .'</b> '. '<span style="color:grey;">'.'@'. $tweets['pseudo'] .' - '. $tweets['tweet_date'] . '</span></span>' .
                                '<br>' .
                                '<span class="contenu_tweet">' .
                                    $new_string.
                                '</span>' .
                                '<div class="div_img_tweet" style="background-image: url(\'tweet/image/'. $tweets['url_image'] .'\');"></div>' .
                            '</p>' .

                            '<div class="buttons_tweet">' .
                                '<button class="button_reaction_tweet"><i class="far fa-heart"></i></button>' .
                                '<button class="button_reaction_tweet" id="comment"><i class="far fa-comment"></i></button>' .
                                '<button class="button_reaction_tweet"><i class="fas fa-retweet"></i></button>' .
                            '</div>' .
                    '</div>' .
                '</div>';

            }
        }

        echo $fil_actu;
    }

    public function getLike()
    {
        $member = $_POST['member'];
        $id_member = $_POST['id_member'];
       
        if(!empty($member)){
            $query_getLike = $this->pdo->prepare('SELECT * FROM tweet INNER JOIN `like` ON like.id_tweet = tweet.id_tweet INNER JOIN user ON user.id_user = tweet.id_autor WHERE like.id_user = ?');
            $query_getLike->execute(array(
                $id_member,
            ));
        }
        else {
            $query_getLike = $this->pdo->prepare('SELECT * FROM tweet INNER JOIN `like` ON like.id_tweet = tweet.id_tweet INNER JOIN user ON user.id_user = tweet.id_autor WHERE like.id_user = ?');
            $query_getLike->execute(array(
                $_SESSION['id'],
            ));
        }
       
        include('charger_like_tweet.php');
    }
}

$action = new User();

if ($_POST["function"] === "getTweet"){
    $action->getTweet();
}
if ($_POST["function"] === "getReply"){
    $action->getReply();
}
if ($_POST["function"] === "getMedia"){
    $action->getMedia();
}
if ($_POST["function"] === "getLike"){
    $action->getLike();
}