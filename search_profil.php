<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil - TWEET ACADEMIE</title>
        <link rel="stylesheet" type="text/css" href="css_js/tweet_profil2.css">
        <link rel="stylesheet" type="text/css" href="css_js/form_edit_profil.css">
        <link rel="stylesheet" type="text/css" href="profil/pictures_css.php">
        <link rel="stylesheet" type="text/css" href="css_js/tweet_fil_actu.css">
        <link rel="stylesheet" type="text/css" href="css_js/followers_following2.css">
        <link href="https://fonts.googleapis.com/css?family=Reem+Kufi&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>


    <body>
    <a name="top_page"></a>


    <section class="section_index">

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">              
    <div class="section_profil_followers">
        <?php include('info_profil.php'); ?>
        <br><br>
        
    </div>
</div>

<div style="height: 0px; width: 0px;">
        <div class="menu_vertical2">
            <a href="#top_page"><div class="top"><i class="fas fa-arrow-up"></i></div></a>
            <a href="accueil.php"><button class="button_menu"><i class="fab fa-twitter"></i></button></a>
            <a href="accueil.php"><button class="button_menu"><i class="fas fa-home"></i></button></a>
            <a href="search.php"><button class="button_menu"><i class="fas fa-search"></i></button></a>
            <a href="messagerie.php"><button class="button_menu"><i class="far fa-envelope"></i></button></a>
            <a href="hashtag.php"><button class="button_menu"><i class="fas fa-hashtag"></i></button></a>
            <a href="user_profil.php"><button class="button_menu"><i class="fas fa-user"></i></button></a>

        </div>
</div>

<div class="actu_menu">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="text" style="display :none ;"  class="pseudo" value="<?php echo $_GET['pseudo']; ?>">
        <input style="display:none;" type="text" name="id_user" class="id_user" value="<?php echo $_GET['id']; ?>">
            <div>
                <div class="titre">
                    <p class="p_accueil">RECHERCHE</p>
                </div>
        
                <br>
            </div>
        
            
            <div class="data_profil"></div>
            <nav class="navbar navbar-expand">
                <ul class="navbar-nav nav-fill w-100">
                    <div class="nav-item">
                    <a class="nav-link target" id="link_tweet" onclick="tweet()" href="#link_tweet">Tweets</a>
                    </div>
                    <div class="nav-item">
                    <a class="nav-link target" id="link_reply" onclick="reply()" href="#link_reply">Réponses</a>
                    </div>
                    <div class="nav-item">
                    <a class="nav-link target" id="link_media" onclick="media()" href="#link_media">Médias</a>
                    </div>
                    <div class="nav-item">
                    <a class="nav-link target" id="link_like" onclick="like()" href="#link_like">J'aime</a>
                    </div>
                </ul>
            </nav>
            <div class="div_fil_actu">
            </div>
            
        </div>

    </div>

    <div id="div_menuu" class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            
            <?php include('info_menu.php'); ?>   
        </div> 


</div>


</section>

        <div class="menu_vertical">
            <a href="#top_page"><div class="top"><i class="fas fa-arrow-up"></i></div></a>
            <a href="accueil.php"><button class="button_menu"><i class="fab fa-twitter"></i></button></a>
            <a href="accueil.php"><button class="button_menu"><i class="fas fa-home"></i></button></a>
            <a href="search.php"><button class="button_menu"><i class="fas fa-search"></i></button></a>
            <a href="messagerie.php"><button class="button_menu"><i class="far fa-envelope"></i></button></a>
            <a href="hashtag.php"><button class="button_menu"><i class="fas fa-hashtag"></i></button></a>
            <a href="user_profil.php"><button class="button_menu"><i class="fas fa-user"></i></button></a>
        </div>
   
        <script src="https://kit.fontawesome.com/3290406d66.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="css_js/form_profil.js"></script>
        <script src="profil/profil-ajax.js"></script>
        <script src="css_js/form_profil_banner.js"></script>
        <script src="css_js/react_tweet_button.js"></script>
        <script src="profil/user_profil-ajax.js"></script>
        
        <script src="search/search_profil.js"></script>
        <script src="search/search.js"></script>
        <script src="css_js/theme.js"></script>

        <?php include('script_theme.php'); ?>

    </body>
</html>