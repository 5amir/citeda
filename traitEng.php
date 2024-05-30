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

if (isset($_POST['enregistrer'])) {

    $idimpr = $_POST['imprimante'];
    $datee = date("Y-m-d");
    $nbrphbn = $_POST['indexphotocopieBn'];
    $nbrphclr = $_POST['indexphotocopieClr'];
    $nbrimpbn = $_POST['indeximpressionBn'];
    $nbrimpclr = $_POST['indeximpressionClr'];

   
    $req = $bdd->prepare('INSERT INTO enregistrer(idimpr,dateajout,nbrphbn,nbrphclr,nbrimpbn,nbrimpclr) VALUES(?,?,?,?,?,?)');
    $req->execute(Array($idimpr,$datee,$nbrphbn,$nbrphclr,$nbrimpbn,$nbrimpclr));
    $req->closeCursor(); 

    
    if ($req) {
        header("Location: acceuil.php?enr=yes");
    }
    else {
        header("Location: acceuil.php?enr=no");
    }
   
}


?>