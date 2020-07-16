<div style="height:0px">


    <div class="photo_profil_board" style="background-image:url('<?php echo $_SESSION['picture'];?>')"></div>
</div>
<div class="div_board_profil">
    <div>
        
        <div class="info_profil_board">
            <br><br><br>
            <h2 style="text-align:center;">Koum Keï</h2>
            <h5>MES INFORMATIONS :</h5>
            <p>
               Né(e) le 07/10/1997<br>
               Genre : <?php echo $_SESSION['genre']; ?><br>
               Orientation : <?php echo $_SESSION['orientation']; ?><br>
               Ville : <?php echo $_SESSION['ville']; ?><br>
               E-mail : <?php echo $_SESSION['email']; ?><br>
               J'aime : <?php echo $_SESSION['loisir_1'] .' '. $_SESSION['loisir_2'] .' '. $_SESSION['loisir_3']; ?>
            </p>
            <div class="border_section"></div>

            <h5>MA BIO :</h5>
            <p>
                Coucou voici ma bio tweet_academy
            </p>
            <div class="border_section"></div>
            <br>
            <div style="margin:auto; margin-bottom:20px;">
                <a href="profil_edit.php"><button  class="button" type="submit">MODIFIER <i class='fas fa-edit'></i></button></a>
                <br><br>
                <a href="deconnexion.php"><button  class="button2" type="submit">DÉCONNECTION <i class="fas fa-power-off"></i></button></a>
                <div style="height:20px"></div>
            </div>

        </div>
    </div>
</div>