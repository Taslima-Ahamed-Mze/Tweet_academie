<form class="form_input_tweet_reply" method="POST" enctype="multipart/form-data">

    <div style="display:flex; justify-content:space-between">
        <div class="mini_photo_profil" style="background-image: url(<?php echo "profil/image/".$_SESSION['profile_picture']."";?>)"></div>
        <input class="input_tweet" placeholder="Tweeter votre reponse" id="content_tweet_rep" type="text" name="message">
        <input class="hidden" value=<?php echo $_SESSION['id']; ?> id="id_auteur" type="text" name="text">
        <input class="hidden" value=<?php echo $_SESSION['prenom']; ?> id="name_autor" type="text" name="text">
        <input class="hidden" value=<?php echo $_SESSION['pseudo']; ?> id="pseudo_autor" type="text" name="text">
        <input class="hidden" value=<?php echo "profil/image/".$_SESSION['profile_picture'].""; ?> id="picture" type="text" name="profile_picture">
        <div class="preview_picture_rep"></div>
    </div>
    

    <div class="div_buttons_tweet" style="width:150px;">
        <label for="file_tweet_rep" name="file_tweet_rep" class="label-file" style="padding-top:5px;"><i class="fas fa-camera"></i></label>
        <input style="display:none;" name="file_tweet_rep" id="file_tweet_rep" class="input-file-tweet" type="file">
        <button class="button_repondre" name ="submit_rep">Repondre</button>
    </div>

</form>