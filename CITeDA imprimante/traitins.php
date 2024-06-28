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

if (isset($_POST['inscrit'])) {

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['profil'];

    $passord_hash = password_hash($password,PASSWORD_DEFAULT);

   
    $req = $bdd->prepare('INSERT INTO users(nom,email,passworduser,profil) VALUES(?,?,?,?)');
    $req->execute(Array($nom,$email,$passord_hash,$status));
    $req->closeCursor(); 

    
    if ($req) {
        header("Location: inscription.php?ajout=yes");
    }
    else {
        header("Location: inscription.php?ajout=no");
    }
   
}


if (isset($_GET['sup']) && $_GET['sup'] == "supprimer"){
    $supp = $bdd->prepare('DELETE FROM users WHERE iduser = ?');
    $supp->execute(array($_GET['iduser']));
    $supp->closeCursor();

    header("Location: inscription.php?supp=yes");
}


?>