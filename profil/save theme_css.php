<?php
session_start();
include('../inscription_connexion/connexion_bdd.php');
header("Content-type: text/css; charset: UTF-8");


$id = $_SESSION['id'];

$theme =$_POST['theme'];
$_SESSION['theme']=$theme;

echo "nouveau theme =" . $theme;

// if ($theme ==  0) {
//     $bdd->query("UPDATE user SET theme=0  WHERE id_user =$id");
// }



if ($theme == 1) {

    $bdd->query("UPDATE user SET theme = 1  WHERE id_user = $id ");


?>

    
    <style>
        /***THEME 1 ***/

        .button_menu:hover {
            border-radius: 50px;
            text-align: left;
            padding: 15px;
            width: 60px;
            height: 60px;
            border: 0px;
            color: white;
            font-size: 30px;
            font-family: manjari;
            margin: 10px;
            background: rgb(249, 85, 255);

        }

        < !-- body {
            background: linear-gradient(217deg, rgb(23, 204, 228), rgb(249, 174, 220) 70.71%);
        }

        -->a:link {
            color: rgb(249, 85, 255);
        }

        a:visited {
            color: rgb(249, 85, 255);
        }

        .button_profil {
            color: white;
            background-color: rgb(249, 85, 255);
        }

        .button_tweeter {
            color: white;
            background-color: rgb(249, 85, 255);
        }

        .border_section {
            background: linear-gradient(217deg, rgb(23, 204, 228), rgb(249, 85, 255) 70.71%);
        }

        .button_reaction_tweet {
            width: 30%;
            height: max-content;
            color: rgb(249, 85, 255);
            background-color: white;
            transition-duration: 0.8s;
        }

        .button_reaction_tweet:hover {
            width: 30%;
            background-color: rgb(249, 85, 255);
            color: white;
            height: max-content;
        }
    </style>
<?php
} 

elseif ($theme == 2) {

    $bdd->query("UPDATE user SET theme = 2  WHERE id_user = $id ");


?>
    <style>
        /***THEME 2 ***/


        .button_menu:hover {
            border-radius: 50px;
            text-align: left;
            padding: 15px;
            width: 60px;
            height: 60px;
            border: 0px;
            color: white;
            font-size: 30px;
            font-family: manjari;
            margin: 10px;
            background: rgb(249, 85, 255);

        }

        body {
            background: linear-gradient(217deg, rgb(23, 204, 228), rgb(255, 235, 179) 70.71%);
        }

        a:link {
            color: rgb(255, 176, 59);
        }

        a:visited {
            color: rgb(255, 176, 59);
        }

        .button_profil {
            color: white;
            background-color: rgb(255, 176, 59);
        }

        .button_tweeter {
            color: white;
            background-color: rgb(255, 176, 59);
        }

        .border_section {
            background: linear-gradient(217deg, rgb(23, 204, 228), rgb(255, 176, 59) 70.71%);
        }

        .button_reaction_tweet {
            width: 30%;
            height: max-content;
            color: rgb(255, 176, 59);
            background-color: white;
            transition-duration: 0.8s;
        }

        .button_reaction_tweet:hover {
            width: 30%;
            background-color: rgb(85, 158, 255);
            color: white;
            height: max-content;
        }
    </style>


<?php

} 

elseif ($theme == 3) {

    $bdd->query("UPDATE user SET theme = 3  WHERE id_user = $id ");
    
?>


    <style>
        /***THEME 3 ***/

        .button_menu:hover {
            border-radius: 50px;
            text-align: left;
            padding: 15px;
            width: 60px;
            height: 60px;
            border: 0px;
            color: white;
            font-size: 30px;
            font-family: manjari;
            margin: 10px;
            background: rgb(85, 158, 255);

        }

        body {
            background: linear-gradient(217deg, rgb(0, 0, 0), rgb(0, 0, 0) 70.71%);
        }

        a:link {
            color: rgb(85, 158, 255);
        }

        a:visited {
            color: rgb(85, 158, 255);
        }

        .button_profil {
            color: white;
            background-color: rgb(85, 158, 255);
        }

        .button_tweeter {
            color: white;
            background-color: rgb(85, 158, 255);
        }

        .border_section {
            background: linear-gradient(217deg, rgb(23, 204, 228), rgb(85, 158, 255) 70.71%);
        }

        .button_reaction_tweet {
            width: 30%;
            height: max-content;
            color: rgb(85, 158, 255);
            background-color: white;
            transition-duration: 0.8s;
        }

        .button_reaction_tweet:hover {
            width: 30%;
            background-color: rgb(85, 158, 255);
            color: white;
            height: max-content;
        }

        p {
            color: white;
        }
    </style>


<?php
}

?>