<?php 
session_start();

try
   {
   $bdd = new PDO('mysql:host=localhost;dbname=citeda', 'root', '');
  
   }
   catch (Exception $e)
   {
   die('Erreur : ' . $e->getMessage());
   }

if (isset($_POST['connecter'])) {
   $email = $_POST['email'] ;
   $password = $_POST['password'] ;

   $passwordhash = password_hash($password,PASSWORD_DEFAULT);

   $verifie = $bdd->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
        $verifie->execute(array($email));
        $count = $verifie->fetchColumn();

        if ($count>0 ) {
            $verifie2 = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $verifie2->execute(array($email));
        $donnees = $verifie2->fetch();

        if (password_verify($password,$donnees['password'])) {

            $_SESSION['id']=$donnees['idusers'];
            $_SESSION['nom']=$donnees['nom'];
            $_SESSION['email']=$donnees['email'];
            $_SESSION['profil']=$donnees['profil'];

            header("Location: acceuil.php");
        }
        
    }else {
        header("Location: index.php?error=authfail");

    }
   
}


?>