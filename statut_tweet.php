<form class="form_input_tweet" method="POST" enctype="multipart/form-data"  action="tweet/traitement_tweet_image.php">

    <div style="display:flex; justify-content:space-between">
        <div class="mini_photo_profil" style="background-image: url(<?php echo "profil/image/".$_SESSION['profile_picture']."";?>)"></div>    
        <input class="input_tweet" placeholder=" Quoi de neuf ?" id="content_tweet" type="text" name="message" maxlength="140" class="form-control" aria-describedby="charNumTweetRep">
        <small id="charNumTweetRep" class="form-text text-muted">0/140</small>
        <input class="hidden" value=<?php echo $_SESSION['id']; ?> id="id_auteur" type="text" name="text">
        <input class="hidden" value=<?php echo $_SESSION['prenom']; ?> id="name_autor" type="text" name="text">
        <input class="hidden" value=<?php echo $_SESSION['pseudo']; ?> id="pseudo_autor" type="text" name="text">
        <input class="hidden" value=<?php echo "profil/image/".$_SESSION['profile_picture'].""; ?> id="picture" type="text" name="profile_picture">
        <div class="preview_picture"></div>
    </div>
    

    <div class="div_buttons_tweet">
        <div>
            <div class="div_emoji" style="cursor:pointer; position:relative; top:5px;"><i class="far fa-smile"></i></div>
            <div style="height:0px; width:0px;">
                <div class="contener_emoji">
                    <div class="emoji_button" id="smile" onclick="enableTxt(this)" >&#128578</div>
                    <div class="emoji_button" id="tongue" onclick="enableTxt(this)">&#128539</div>
                    <div class="emoji_button" id="lol" onclick="enableTxt(this)">&#129315</div>
                    <div class="emoji_button" id="sad" onclick="enableTxt(this)">&#128577</div>
                    <div class="emoji_button" id="teeth" onclick="enableTxt(this)">&#128556</div>            
                    <div class="emoji_button" id="fear" onclick="enableTxt(this)">&#128552</div>
                    <div class="emoji_button" id="cry" onclick="enableTxt(this)">&#128546</div>
                    <div class="emoji_button" id="thinking" onclick="enableTxt(this)">&#128580</div>
                    <div class="emoji_button" id="hush" onclick="enableTxt(this)">&#129296</div>
                    <div class="emoji_button" id="heart" onclick="enableTxt(this)">&#128147</div>
                    <div class="emoji_button" id="money" onclick="enableTxt(this)">&#129297</div>
                    <div class="emoji_button" id="sick" onclick="enableTxt(this)">&#129298</div>
                    <div class="emoji_button" id="geek" onclick="enableTxt(this)">&#129299</div>
                    <div class="emoji_button" id="thinking2" onclick="enableTxt(this)">&#129300</div>
                    <div class="emoji_button" id="cowboy" onclick="enableTxt(this)">&#129312</div>
                </div>
            </div>
        </div>
            <label for="file_tweet" name="file_tweet" class="label-file" style="padding-top:5px; cursor:pointer;"><i class="fas fa-camera"></i></label>
        <input style="display:none;" name="file_tweet" id="file_tweet" class="input-file-tweet" type="file">
        <input class="button_tweeter" type="submit" value="Tweeter" name ="submit">
    </div>
</form>

