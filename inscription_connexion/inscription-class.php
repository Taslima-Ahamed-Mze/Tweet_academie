<?php

session_start();
require_once 'class-connexion.php';
class Inscription
{
    public $nom;
    public $prenom;
    public $pseudo;
    public $naissance;
    public $email;
    public $password;
    public $subdate;


    public function __construct()
    {
        $this->pdo = DatabaseConnection::getInstance()->handle();
    }



    public function execute()
    {
        if (isset($_POST['submit'])) {

            $this->nom = $_POST['nom'];
            $this->prenom = $_POST['prenom'];
            $this->pseudo = $_POST['pseudo'];
            $this->naissance = $_POST['naissance'];
            $this->email = $_POST['email'];
            $this->password = hash( 'ripemd160', $_POST['password']."vive le projet tweet_academy");
            $this->subdate= date('Y-m-d');

            $this->data = $this->pdo->query("SELECT * FROM user WHERE email = '" . $this->email . "'");
            if ($this->data->fetchColumn() > 0) {
                echo "renseigne un autre email";
            } 
            $this->data = $this->pdo->query("SELECT * FROM user WHERE pseudo = '" . $this->pseudo . "'");
            if ($this->data->fetchColumn() > 0) {
                echo "renseigne un autre pseudo";
            } 
            else
            {
                $this->pdo->exec("INSERT INTO user (name, surname, email, pseudo, birthdate, password, subscribe_date) 
                VALUES('" . $this->nom . "', '" . $this->prenom . "', '" . $this->email . "','" . $this->pseudo . "' ,'" . $this->naissance . "', '" . $this->password. "', '" . $this->subdate . "') ") or die("failed");

                $recherches = $this->pdo->query("SELECT id_user FROM user WHERE email='". $this->email . "'");
                while($resultat = $recherches->fetch()){
                    $id=$resultat['id_user'];
                }


                $_SESSION['email'] = $this->email;
                $_SESSION['pseudo'] = $this->pseudo;
                $_SESSION['nom'] = $this->nom;
                $_SESSION['prenom'] = $this->prenom;
                $_SESSION['date_naiss'] = $this->naissance;
                $_SESSION['date_j'] =$this->subdate;
                $_SESSION['id'] =$id;
                
                header('Location:../inscription_connexion/index.php');
            }
            
        }
    }
}
$action = new Inscription();
$action->execute();
