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

   date_default_timezone_set('Africa/Lagos');
   $datee = date('y-m-d H:i:s');

if (isset($_POST['enregistrer'])) {

    $idimpr = $_POST['imprimante'];

   
    $query =$bdd->prepare("SELECT * FROM historique WHERE idimpr = ? ORDER BY date_his DESC LIMIT 1");
    $query ->execute(array($idimpr));
    $lastindex = $query->fetch();
  
    $req = $bdd->prepare('INSERT INTO historique(idimpr,d_i_phbn,n_i_phbn,d_i_phclr,n_i_phclr,d_i_impbn,n_i_impbn,d_i_impclr,n_i_impclr,date_his) VALUES(?,?,?,?,?,?,?,?,?,?)');
    $req->execute(Array($idimpr,$lastindex['n_i_phbn'],$_POST['indexphotocopieBn'],$lastindex['n_i_phclr'],$_POST['indexphotocopieClr'],
    $lastindex['n_i_impbn'],$_POST['indeximpressionBn'],$lastindex['n_i_impclr'],$_POST['indeximpressionClr'],$datee));
  
    if ($req) {
        header("Location: acceuil.php?enr=yes");
    }
    else {
        header("Location: acceuil.php?enr=no");
    }
   
}


?>