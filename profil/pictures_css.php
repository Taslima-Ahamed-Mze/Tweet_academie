<?php
    session_start();
    header("Content-type: text/css; charset: UTF-8");
    $_SESSION['profile_picture'];
?>

<!-- #profil_image_upload {
    background-image: url(<?php echo "./image/".$_SESSION['profile_picture']."";?>);
}

.photo_profil {
    background-image: url(<?php echo "./image/".$_SESSION['profile_picture']."";?>);
} -->

.mini_photo_profil_session {
    background-image: url(<?php echo "./image/".$_SESSION['profile_picture']."";?>);
    background-size:cover;
    height: 50px;
    width: 50px;
    border-radius:100px ;
    z-index: 10;
    margin-right: 10px;  
}

/***************PETIT**************/
@media (max-width:768px){

    .mini_photo_profil_session {
        background-image: url(<?php echo "./image/".$_SESSION['profile_picture']."";?>);
        background-size:cover;
        height: 70px;
        width: 70px;
        border-radius:100px ;
        z-index: 10;
        margin-right: 10px;  
    }

}