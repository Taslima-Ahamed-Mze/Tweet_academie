<?php
    session_start();
    require_once 'class-connexion.php';
    class Connexion{

        public $password;
        public $data;
        public $pdo;
        public $nom;
        public $prenom;
        public $genre;
        public $email;
        public $date;
        public $ville;
        public $year;
        public $valide;
        public $value;
        public $choix = [];
        public $choice;
        public $id;
        public $req;
        public $alert='';
        public $i;
        public $followers;
        public $abonnements;
        public function __construct()
        {
            $this->pdo = DatabaseConnection::getInstance()->handle();
        }

        public function connecting()
        {
            if(isset($_POST['submit']))
            {

                $this->email =$_POST['email'];
                $this->password =hash('ripemd160',$_POST['password']."vive le projet tweet_academy");

                // $this->email ="tas@tas.com";
                // $this->password =hash('ripemd160','hhhhh' );

                
                $this->data = $this->pdo->query("SELECT * FROM user WHERE email='".$this->email."' AND password='".$this->password."' ") or die("failed");
                if($this->data->fetchColumn() > 0 )
                {   
                    $this->req = $this->pdo->query("SELECT * FROM user WHERE email='".$this->email."' AND password='".$this->password."'") or die("failed");


                        foreach($this->req as $this->value)
                        {
                           if($this->value['theme'] == 42)
                           {
                               $this->alert .= "Ce compte est desactivé";
                               $_SESSION['id'] = $this->value['id_user'];
                            }
                            else{
                       
                                $_SESSION['email'] = $this->value['email'];
                                $_SESSION['pseudo'] = $this->value['pseudo'];
                                $_SESSION['nom'] = $this->value['name'];
                                $_SESSION['prenom'] = $this->value['surname'];

                                $_SESSION['date_naiss'] = $this->value['birthdate'];
                                $_SESSION['date_j'] =$this->value['subscribe_date'];
                                $_SESSION['id'] = $this->value['id_user'];
                                $_SESSION['bio'] = $this->value['bio'];
                                $_SESSION['profile_picture'] = $this->value['profile_picture'];
                                $_SESSION['theme'] = $this->value['theme'];
                            }
                    }


                    //RECUP NOMBRE FOLLOWERS & ABONNEMENTS
                    if($this->alert==''){
                    $nbr_follow=0;
                    $this->followers = $this->pdo->query("SELECT * FROM follow WHERE id_followed=".$_SESSION['id']) or die("failed");
                    foreach($this->followers as $this->data_follow){
                        $nbr_follow++;
                    }

                    $nbr_abo=0; $array_abo=array();
                    $this->abonnements = $this->pdo->query("SELECT * FROM follow WHERE id_follower=".$_SESSION['id']) or die("failed");
                    foreach($this->abonnements as $this->data_abo){
                        $nbr_abo++;

                        array_push($array_abo, $this->data_abo['id_followed']);
                    }

                    $_SESSION['nbr_followers'] = $nbr_follow;
                    $_SESSION['nbr_abonnements'] = $nbr_abo;


                    //RECUP DES CONTACTS (ABONNEMENTS)
                    $liste_contact="";
                    for($i=0 ; $i< count($array_abo) ; $i++){

                        $req_contact = $this->pdo->query("SELECT * FROM user WHERE id_user=".$array_abo[$i]) or die("failed");
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
                    }

                    $_SESSION['contacts'] = $liste_contact;
                    header('Location:../accueil.php'.$id);
                }   
                    
                else
                {
                    // echo $this->alert;
                    header('Location:../active.php');
                }
                
                }
                else{
                    echo "Identifiants incorrects" ;  
                }
                // echo $this->password;

            
            }
            
        }

    }
    $action = new Connexion();
    $action->connecting();
    
     
    
 
    
?>
