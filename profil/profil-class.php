<?php
session_start();
require_once('../inscription_connexion/class-connexion.php');

class Profil {

    public $new_name;
    public $new_surname;
    public $new_email;
    public $bio;
    public $new_birthdate;

    public function __construct($new_name, $new_surname, $new_email, $bio, $new_birthdate)
    {
        $this->pdo = DatabaseConnection::getInstance()->handle();
        $this->new_name = $new_name;
        $this->new_surname = $new_surname;
        $this->new_email = $new_email;
        $this->bio = $bio;
        $this->new_birthdate = $new_birthdate;
    }

    public function update()
    {    

        if (!empty($_POST['new_name'])) {
        $query_newName = $this->pdo->prepare('UPDATE user SET name = ? WHERE email = ?');
        $query_newName->execute(array(
            $this->new_name,
            $_SESSION["email"],
        ));
        $_SESSION['nom'] = $this->new_name;
        }else{
            $this->new_name = $_SESSION['nom'];
        }

        if (!empty($_POST['new_surname'])) {
        $query_newSurname = $this->pdo->prepare('UPDATE user SET surname = ? WHERE email = ?');
        $query_newSurname->execute(array(
            $this->new_surname,
            $_SESSION["email"],
        ));
        $_SESSION['prenom'] = $this->new_surname;
        }else{
            $this->new_surname = $_SESSION['prenom'];
        }   

        if (!empty($_POST['new_email'])) {
        $query_newEmail = $this->pdo->prepare('UPDATE user SET email = ? WHERE email = ?');
        $query_newEmail->execute(array(
            $this->new_email,
            $_SESSION["email"],
        ));
        $_SESSION['email'] = $this->new_email;
        }else{
            $this->new_email = $_SESSION['email'];
        }
    
        if (!empty($_POST['bio'])) {
        $query_bio = $this->pdo->prepare('UPDATE user SET bio = ? WHERE email = ?');
        $query_bio->execute(array(
            $this->bio,
            $_SESSION["email"],
        ));
        $_SESSION['bio'] = $this->bio;
        }else{
            $this->bio = $_SESSION['bio'];
        }

        if (!empty($_POST['new_birthdate'])) {
        $query_newBirthdate = $this->pdo->prepare('UPDATE user SET birthdate = ? WHERE email = ?');
        $query_newBirthdate->execute(array(
            $this->new_birthdate,
            $_SESSION["email"],
        ));
        $_SESSION['date_naiss'] = $this->new_birthdate;
        }else{
            $this->new_birthdate = $_SESSION['date_naiss'];
        }

        echo "Modifications effectuées";
    }
 
    public function profilePicture() {
        $query_profilImage = $this->pdo->prepare('UPDATE user SET profile_picture = ? WHERE email = ?');
        $query_profilImage->execute(array(
            $_FILES['file']['name'],
            $_SESSION["email"],
        ));
        $uploads_dir = './image';
        $name = $_FILES["file"]["name"];

        move_uploaded_file($_FILES["file"]["tmp_name"],"$uploads_dir/$name");

        $_SESSION['profile_picture'] = $_FILES['file']['name'];
    }
}

$action = new Profil($_POST['new_name'], $_POST['new_surname'], $_POST['new_email'], $_POST['bio'], $_POST['new_birthdate']);
if (isset($_FILES['file'])) {
    $action->profilePicture();
}else{
    $action->update();
}