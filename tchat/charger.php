<?php
session_start();
include('../inscription_connexion/connexion_bdd.php');

$id_envoie=$_SESSION['id'];
$id_recois=$_GET['id'];

if(!empty($_GET['id'])){ 
    
    $requete = $bdd->query("SELECT * FROM message WHERE id_expeditor=$id_envoie OR id_expeditor=$id_recois");
    $messages ="";
    while($donnees = $requete->fetch()){
        $dir="image";
        $content_dir = scandir($dir);
        for ($i=0 ; $i< count($content_dir) ; $i++){

            if ($donnees['id_expeditor']==$id_envoie && $donnees['id_receiver']==$id_recois && $donnees['content_message']==$content_dir[$i]){
                $messages .= 
                "<a href='tchat/image/".$donnees['content_message']."'>
                    <div style='display:flex; justify-content:space-between; width:100%;'> 
                        <div></div> 
                        <div  data-toggle='modal' data-target='#modalImgMessage' class=\"img_msg_envoie\" style='background-image: url(\"tchat/image/".  $donnees['content_message'] . "\");'></div>
                    </div>
                </a>";
            }

            if ($donnees['id_expeditor']==$id_recois && $donnees['id_receiver']==$id_envoie && $donnees['content_message']==$content_dir[$i]){
                $messages .= 
                "<a href='tchat/image/".$donnees['content_message']."'>
                    <div style='display:flex; justify-content:space-between; width:100%;'>
                        <div class=\"img_msg_recois\" style='background-image: url(\"tchat/image/".  $donnees['content_message'] . "\");'></div>
                        <div></div>
                    </div>
                </a>";
            }
        }


        if($donnees['id_expeditor']==$id_envoie && $donnees['id_receiver']==$id_recois){
            $messages .= "<div style='display:flex; justify-content:space-between; width:100%;'> <div></div>  <div style='flex-direction:column;'> <p class='bulle_envoie'>" . $donnees['content_message'] . "</p> <p style='font-size:8px; position:relative; bottom:8px;'>".$donnees['message_date']."</p></div></div>";
        }


        elseif($donnees['id_expeditor']==$id_recois && $donnees['id_receiver']==$id_envoie){
            $messages .= "<div style='display:flex; justify-content:space-between; width:100%;'> <div style='flex-direction:column;'> <p class='bulle_recois'>" . $donnees['content_message'] . "</p> <p style='font-size:8px; position:relative; bottom:8px;'>".$donnees['message_date']."</p></div>  <div></div></div>";
        }
    }

    echo $messages;

}

?>
