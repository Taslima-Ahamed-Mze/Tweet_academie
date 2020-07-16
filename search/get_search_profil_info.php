<?php
session_start();
include('../inscription_connexion/connexion_bdd.php');

$id_user=$_GET['id_user'];


$nbr_follow=0;
$requete = $bdd->query("SELECT * FROM follow WHERE id_followed=".$id_user) or die("failed");
while($donnees = $requete->fetch()){
    $nbr_follow++;
}

$nbr_abo=0;
$requete = $bdd->query("SELECT * FROM follow WHERE id_follower=".$id_user) or die("failed");
while($donnees = $requete->fetch()){
    $nbr_abo++;
}

$requete = $bdd->query("SELECT * FROM user WHERE id_user='".$id_user."'");
while($donnees = $requete->fetch()){
    $result =
    '<div class="photo_profil" style="background-image: url(\'profil/image/'.$donnees['profile_picture'].'\')"></div>' .
        '<br>' .

        '<h2 class="h2_bio" style="text-align:center;">'. $donnees['surname'] . " " . $donnees['name'] . '</h2>' .
        '<p class="pseudo_profil">@'.$donnees['pseudo'] . '</p>' .
        '<p class="date_inscription">Naissance : ' . $donnees['birthdate'] . '</p>' .
        '<p class="date_inscription">' .
            'Membre depuis le ' . $donnees['subscribe_date'] . ' <i class="far fa-calendar-alt"></i>' . 
        '</p>' .
        '<div class="info_profil">' .
            '<div class="chiffres_follows" style="display:flex; justify-content:space-between;">' .
                '<p class="p_chiffres"><b>' . $nbr_abo. '</b> abonnements</p>'.
                '<p class="p_chiffres"><b>' . $nbr_follow . '</b> followers</p>' .
            '</div>' .
        '</div>';
}
            
echo $result;