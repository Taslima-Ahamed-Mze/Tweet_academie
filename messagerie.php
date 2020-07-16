<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Messages - TWEET ACADEMIE</title>

        
        <link rel="stylesheet" type="text/css" href="css_js/tweet_profil.css">
        <link rel="stylesheet" type="text/css" href="css_js/form_edit_profil.css">
        <link rel="stylesheet" type="text/css" href="css_js/tweet_fil_actu.css">
        <link rel="stylesheet" type="text/css" href="css_js/messagerie.css">
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
            <div class="cache_profil">
                <div class="col-xs-4 col-sm-12 col-md-12 col-lg-12" id="info_profil">              
                    <div class="section_profil_followers">
                        <?php include('info_profil.php'); ?>
                        <br><br>
                    </div>
                </div>
            </div>
            
            <div class="actu_menu">
            
                <div class="col-xs-4 col-sm-12 col-md-12 col-lg-10">
                
                    <div class="div_fil_actu">
                        
                        <div class="section_message">
                            <?php include('tchat/contacts.php'); ?>
                            <?php if(!empty($_POST['id_recois'])){include('tchat/tchat.php');} ?>
                        </div>
                        <br>

                    </div>
                </div>
           
                <div id="div_menuu" class="col-xs-1 col-sm-12 col-md-12 col-lg-2">
                    
                    <?php include('info_menu.php'); ?>    

                </div>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="css_js/form_profil.js"></script>
        <script src="profil/profil-ajax.js"></script>
        <script src="tchat/tchat-ajax.js"></script>
        <script src="css_js/form_profil_banner.js"></script>
        <script src="css_js/theme.js"></script>


        <?php include('script_theme.php'); ?>
        
    </body>
</html>