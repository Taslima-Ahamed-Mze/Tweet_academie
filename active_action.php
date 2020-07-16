<?php
session_start();
require_once('inscription_connexion/connexion_bdd.php');
if(isset($_POST['submit']))
{
    $req = $bdd->exec("UPDATE user SET theme = NULL WHERE id_user=".$_SESSION['id']) or die("fail");

    $req = $bdd->query("SELECT * FROM user WHERE id_user=".$_SESSION['id']) or die("fail");

    foreach($req as $value)
    {
        
        $_SESSION['email'] = $value['email'];
        $_SESSION['pseudo'] = $value['pseudo'];
        $_SESSION['nom'] = $value['name'];
        $_SESSION['prenom'] = $value['surname'];

        $_SESSION['date_naiss'] = $value['birthdate'];
        $_SESSION['date_j'] =$value['subscribe_date'];
        $_SESSION['id'] = $value['id_user'];
        $_SESSION['bio'] = $value['bio'];
        $_SESSION['profile_picture'] = $value['profile_picture'];

    }


//RECUP NOMBRE FOLLOWERS & ABONNEMENTS

    $nbr_follow=0;
    $followers = $bdd->query("SELECT * FROM follow WHERE id_followed=".$_SESSION['id']) or die("failed");
    foreach($followers as $data_follow){
        $nbr_follow++;
    }

    $nbr_abo=0; $array_abo=array();
    $abonnements = $bdd->query("SELECT * FROM follow WHERE id_follower=".$_SESSION['id']) or die("failed");
    foreach($abonnements as $data_abo){
        $nbr_abo++;

        array_push($array_abo, $data_abo['id_followed']);
    }

    $_SESSION['nbr_followers'] = $nbr_follow;
    $_SESSION['nbr_abonnements'] = $nbr_abo;


    //RECUP DES CONTACTS (ABONNEMENTS)
    $liste_contact="";
    for($i=0 ; $i< count($array_abo) ; $i++){

        $req_contact = $bdd->query("SELECT * FROM user WHERE id_user=".$array_abo[$i]) or die("failed");
        foreach($req_contact as $info){
            $liste_contact.=
            '<form action="messagerie.php?id='.$info['id_user'] .'" method="POST">'.
                '<div class="div_membre_contact">' .
                    '<div class="mini_photo_profil_contact" style="background-image: url(\'profil/image/'.$info['profile_picture'].'\');"></div>' .
                    '<div>' .
                        '<p>' .
                            '<span class="p_prenom_correspondant">'.'<b>'.$info['surname'].'</b>'.'</span>' .
                            '<span class="p_pseudo_correspondant"> @'.$info['pseudo'].'</span>' .
                            '<br>' .
                            '<span class="last_message">'.'Dernier message ici' . '</span>' .
                        '</p>' .
                    '</div>' .
                '</div>' .

                '<input class="hidden" type="text" name="id_recois" value="'.$info['id_user'].'">' .
                '<input class="hidden" type="text" name="name" value="'.$info['name'].'">' .
                '<input class="hidden" type="text" name="surname" value="'.$info['surname'].'">' .
                '<input class="hidden" type="text" name="pseudo" value="'.$info['pseudo'].'">' .

                '<div style="height:0px">' .
                    '<input type="submit" class="select_contact_submit">' .
                '</div>' .
            '</form>';
        }
        $_SESSION['contacts'] = $liste_contact;

        header('Location:accueil.php'.$id);
    }




}









?>