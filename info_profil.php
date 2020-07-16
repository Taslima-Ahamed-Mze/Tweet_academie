<?php session_start();?>
<?php if (empty($_SESSION['id'])){
    header('location: inscription_connexion/index.php');
    }
    if ($_SESSION['profile_picture']==""){
        $_SESSION['profile_picture']="blank.png";
    }
?>
<div class="div_info_profil">

    <div class="info_profil">

        <br>
        <div class="photo_profil" style="background-image: url(<?php echo "profil/image/".$_SESSION['profile_picture']."";?>)"></div>
        <br>

        <h2 class="h2_bio" style="text-align:center;"><?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></h2>
            <p class="pseudo_profil"><?php echo '@'.$_SESSION['pseudo']; ?></p>
            
            <p class="date_inscription">Naissance : <?php echo $_SESSION['date_naiss']; ?></p>

            <p class="date_inscription">
                
                Membre depuis le <?php echo $_SESSION['date_j'];?> <i class="far fa-calendar-alt"></i>
            </p>
            <div style="padding-left:20px; padding-right:20px; padding-bottom:20px;">
            <div class="chiffres_follows">
                <a href="following.php"><p class="p_chiffres"><b><?php echo $_SESSION['nbr_abonnements']; ?></b> abonnements</p></a>
                <a href="followers.php"><p class="p_chiffres"><b><?php echo $_SESSION['nbr_followers']; ?></b> followers</p></a>
            </div>

            <div class="border_section"></div>
            <br>
            <p class="bio">
                <?php echo $_SESSION['bio']; ?>
            </p>
            <div class="border_section"></div>
            <br>

            <div class="div_buttons">
            <div class="button_profil" data-toggle="modal" data-target="#modalProfile">MODIFIER <i class='fas fa-edit'></i></div>
                <a href="inscription_connexion/deconnexion.php"><div class="button_profil">DÉCONNECTION <i class="fas fa-power-off"></i></div></a>
                <a href="inscription_connexion/desactive.php"><div class="button_profil">DÉSACTIVER <i class="fas fa-exit"></i></div></a>
            </div>
            <?php include('form_edit_profil.php'); ?>
        </div>

    </div>


</div>