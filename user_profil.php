<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil - TWEET ACADEMIE</title>
        <link rel="stylesheet" type="text/css" href="css_js/tweet_profil2.css">
        <link rel="stylesheet" type="text/css" href="css_js/form_edit_profil.css">
        <link rel="stylesheet" type="text/css" href="profil/pictures_css.php">
        <link href="https://fonts.googleapis.com/css?family=Reem+Kufi&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css_js/user_profil.css">
    </head>
    <body>
        <a name="top_page"></a>

         <section class="section_index" style="justify-content: center">
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 d-flex">
                <div class="div_info_profil">
                    <br>
                    <div class="photo_profil" style="background-image: url(<?php echo "profil/image/".$_SESSION['profile_picture']."";?>)"></div>
                    <br>

                    <h2 class="h2_bio" style="text-align:center;"><?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></h2>
                    <p class="pseudo_profil"><?php echo '@'.$_SESSION['pseudo']; ?></p>
                    <p class="birthdate_profil">Naissance : <?php echo $_SESSION['date_naiss']; ?></p>
                    <p class="date_inscription">
                        Membre depuis le <?php echo $_SESSION['date_j'];?> <i class="far fa-calendar-alt"></i>
                    </p>
                    <div class="info_profil">
                        <div class="chiffres_follows">
                            <a href="following.php" id="link_following"><p class="p_chiffres"><b><?php echo $_SESSION['nbr_abonnements']; ?></b> abonnements</p></a>
                            <a href="followers.php" id="link_followers"><p class="p_chiffres"><b><?php echo $_SESSION['nbr_followers']; ?></b> followers</p></a>
                        </div>
                    

                        <div class="border_section"></div>
                        <br>
                        <p class="bio">
                            <?php echo $_SESSION['bio']; ?>
                        </p>
                        <div class="border_section"></div>
                        <br>
                    </div>

                    <div class="div_buttons">
                    <div class="button_profil" data-toggle="modal" data-target="#modalProfile">MODIFIER <i class='fas fa-edit'></i></div>
                        <a href="inscription_connexion/deconnexion.php"><div class="button_profil">DÉCONNECTION <i class="fas fa-power-off"></i></div></a>
                    </div>

                    <?php include('form_edit_profil.php'); ?>

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
            <div id="div_menuu" class="col-xs-2 col-sm-2 col-md-1 col-lg-1">  
                <?php include('info_menu.php'); ?>
            </div>
        </section>

        <div class="menu_vertical">
            <!-- <a href="#top_page"><div class="top"><i class="fas fa-arrow-up"></i></div></a> -->
            <a href="accueil.php"><button class="button_menu"><i class="fab fa-twitter"></i></button></a>
            <a href="accueil.php"><button class="button_menu"><i class="fas fa-home"></i></button></a>
            <a href="search.php"><button class="button_menu"><i class="fas fa-search"></i></button></a>
            <a href="messagerie.php"><button class="button_menu"><i class="far fa-envelope"></i></button></a>
            <a href="hashtag.php"><button class="button_menu"><i class="fas fa-hashtag"></i></button></a>
            <a href="user_profil.php"><button class="button_menu user"><i class="fas fa-user"></i></button></a>
        </div>

        <script src="https://kit.fontawesome.com/3290406d66.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="profil/profil-ajax.js"></script>
        <script src="profil/theme.js"></script>
        <script src="css_js/form_profil.js"></script>
        <script src="profil/user_profil-ajax.js"></script>
        
        <script src="css_js/react_tweet_button.js"></script>

        <script src="css_js/react_tweet_button.js"></script>

        <script src="css_js/theme.js"></script>


        <?php include('script_theme.php'); ?>
    </body>
</html>