<!------------- THEME 1 - ROSE ------------>
<?php if (@$_SESSION['theme']==1){
            ?> 
            <script src="css_js/theme1.js"></script>

            <style>

                /* POUR ACCUEIL */
                .button_reaction_tweet{
                    width: 30%;
                    height: max-content;
                    color:rgb(249, 85, 255);
                    background-color: white; 
                    transition-duration: 0.8s; 
                }

                .button_reaction_tweet:hover{
                    width: 30%;
                    background-color: rgb(249, 85, 255);
                    color: white;
                    height: max-content;
                } 


                /* POUR MESSAGERIE */
                .bulle_envoie{
                    float: right;
                    width: auto;
                    background-color:rgb(249, 85, 255);
                    max-width: 200px;
                    min-width:10px;
                    height: auto;
                    padding: 10px;
                    color: white;
                    border-top-right-radius:20px;
                    border-bottom-left-radius: 20px;
                    border-top-left-radius: 20px;
                    margin-top: 10px;
                    text-align: right;
                }


                /* USER PROFIL */
                .nav-item a:hover {
                    color:rgb(249, 85, 255);
                }

                .nav-link a:focus a:active {
                    border-bottom: 2px solid rgb(249, 85, 255);
                }

                :target {
                    border-bottom: 2px solid rgb(249, 85, 255);
                }

}
            </style>

         <?php
        }
        ?>





<!------------- THEME 2 - ORANGE ------------>
<?php if (@$_SESSION['theme']==2){
    ?> 
    <script src="css_js/theme2.js"></script>

    <style>
        /* POUR ACCUEIL */
        .button_reaction_tweet{
            width: 30%;
            height: max-content;
            color:rgb(255, 167, 51);
            background-color: white; 
            transition-duration: 0.8s; 
        }

        .button_reaction_tweet:hover{
            width: 30%;
            background-color: rgb(255, 167, 51);
            color: white;
            height: max-content;
        } 


        /* POUR MESSAGERIE */
        .bulle_envoie{
            float: right;
            width: auto;
            background-color:rgb(255, 167, 51);
            max-width: 200px;
            min-width:10px;
            height: auto;
            padding: 10px;
            color: white;
            border-top-right-radius:20px;
            border-bottom-left-radius: 20px;
            border-top-left-radius: 20px;
            margin-top: 10px;
            text-align: right;
        }


        /* USER PROFIL */
        .nav-item a:hover {
            color:rgb(255, 167, 51);
        }

        .nav-link a:focus a:active {
            border-bottom: 2px solid rgb(255, 167, 51);
        }

        :target {
            border-bottom: 2px solid rgb(255, 167, 51);
        }
    </style>

    <?php
}
?>








<!------------- THEME 3 - DARK ------------>
<?php if (@$_SESSION['theme']==3){
    ?> 
    <script src="css_js/theme3.js"></script>

    <style>
        p{
            color:white;
        }

        span{
            color:white;
        }

        .h2_bio{
            color:white;
        }
        /* POUR ACCUEIL */
        .button_reaction_tweet{
            width: 30%;
            height: max-content;
            color:white;
            background-color: black; 
            transition-duration: 0.8s; 
        }

        .button_reaction_tweet:hover{
            width: 30%;
       
            color: white;
            height: max-content;
        } 


        /* POUR MESSAGERIE */
        .bulle_envoie{
            float: right;
            width: auto;
        
            max-width: 200px;
            min-width:10px;
            height: auto;
            padding: 10px;
            color: white;
            border-top-right-radius:20px;
            border-bottom-left-radius: 20px;
            border-top-left-radius: 20px;
            margin-top: 10px;
            text-align: right;
        }

        .form_search{
            background-color:white;
        }


        /* USER PROFIL */
        .nav-item a:hover {
        
        }

        .nav-link a:focus a:active {
           
        }

        .nav-item {
            color:white;
          
        }
    </style>

    <?php
}
?>