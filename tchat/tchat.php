<?php $_SESSION['id_recois']= $_POST['id_recois']; ?>
<div class="col-xs-4 col-sm-12 col-md-7 col-lg-7">
    <div class="section_chat">

        <div class="div_correspondant">
            <?php echo 
            '<b>'.$_POST['surname'].'</b>' . 
            '<br>' .
            '<span style="color:grey; font-size:12px; position:relative; bottom:10px;">'.' @'.$_POST['pseudo'].'</span>'; ?>
        </div>


        <div class="div_tchat"></div>
        <form class="form_envoie_message" enctype="multipart/form-data" method="POST">

            <input  class="textarea_tchat" placeholder="  Ecrire un nouveau message..." name="message" id="message">
            <div style="margin-top:5px;">

            <label for="file" class="label-file"><i class="fas fa-camera"></i></label>
            <input style="display:none;" id="file" class="input-file" type="file">


            
            <input style="display:none;" id="img_file"  class="input-file" type="file"/>

                <input style ="display:none;" name="id_recois" id="id_recois" class="id_recois" value=<?php echo @$_POST['id_recois'];?>>
                <button type="submit" class="button_envoie_message"><i class="fas fa-paper-plane"></i></button>
            </div>
        </form>
    </div>

</div>