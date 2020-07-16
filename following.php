<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil - TWEET ACADEMIE</title>
        <link rel="stylesheet" type="text/css" href="css_js/form_edit_profil.css">
        <link rel="stylesheet" type="text/css" href="profil/pictures_css.php">
        <link rel="stylesheet" type="text/css" href="css_js/tweet_fil_actu.css">
        <link rel="stylesheet" type="text/css" href="css_js/form_edit_profil.css">
        <link rel="stylesheet" type="text/css" href="css_js/tweet_profil.css">
        <link rel="stylesheet" type="text/css" href="css_js/followers_following.css">
        <link href="https://fonts.googleapis.com/css?family=Reem+Kufi&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
    </head>


    <body>
    <a name="top_page"></a>


 
    
        <!-- <nav>
            <h3 class="h3_logo">TWEET ACADEMIE. </h3>
        </nav> -->

        <section class="section_index">

            <div class="col-xs-2 col-sm-12 col-md-4 col-lg-3">              
                <div class="section_profil_followers">
                    <?php include('info_profil.php'); ?>
                    <br><br>
                    <?php //include('info_follower.php'); ?>
                </div>
            </div>
            
            <div class="actu_menu">

                <div class="col-xs-2 col-sm-12 col-md-12 col-lg-8">
                    <div class="titre">
                        <p class="p_follow">FOLLOWING</p>
                    </div>
                    <div class="div_fil_actu">
                        <div class="div_info_following">
                            
                        </div>
                    </div>
                </div>

                <div id="div_menuu" class="col-xs-12 col-sm-12 col-md-12 col-lg-1">
                    
                    <?php include('info_menu.php'); ?>    

            </div>
           

        </section>

        <div class="menu_vertical">
            <a href="#top_page"><div class="top"><i class="fas fa-arrow-up"></i></div></a>
            <a href="accueil.php"><button class="button_menu"><i class="fab fa-twitter"></i></button></a>
            <a href="accueil.php"><button class="button_menu"><i class="fas fa-home"></i></button></a>
            <a href="search.php"><button class="button_menu"><i class="fas fa-search"></i></button></a>
            <a href="messagerie.php"><button class="button_menu"><i class="far fa-envelope"></i></button></a>
            <button class="button_menu"><i class="fas fa-hashtag"></i></button>
            <button class="button_menu"><i class="fas fa-retweet"></i></button>
        </div>
   
        <script src="https://kit.fontawesome.com/3290406d66.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="css_js/form_profil.js"></script>
        <script src="profil/profil-ajax.js"></script>
        <script src="css_js/unfollow_membre.js"></script>
        <script src="css_js/form_profil_banner.js"></script>

        <script src="css_js/react_tweet_button.js"></script>
        <script src="css_js/theme.js"></script>


        <?php include('script_theme.php'); ?>
    </body>
</html>