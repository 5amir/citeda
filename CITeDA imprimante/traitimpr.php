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

if (isset($_POST['ajouter'])) {

    $nomimpr = $_POST['nomimpr'];
    $prixphbn = $_POST['prixphbn'];
    $prixphclr = $_POST['prixphclr'];
    $priximpbn = $_POST['priximpbn'];
    $priximpclr = $_POST['priximpclr'];

    date_default_timezone_set('Africa/Lagos');
    $datee = date('y-m-d H:i:s');
   
    $req = $bdd->prepare('INSERT INTO imprimente(nomimpr,prixphbn,priximbn,prixphclr,priximclr) VALUES(?,?,?,?,?)');
    $req->execute(Array($nomimpr,$prixphbn,$priximpbn,$prixphclr,$priximpclr));
    $req->closeCursor(); 

    $idimpr = $bdd->lastInsertId();

    $req2 = $bdd->prepare('INSERT INTO historique(idimpr,d_i_phbn,n_i_phbn,d_i_phclr,n_i_phclr,d_i_impbn,n_i_impbn,d_i_impclr,n_i_impclr,date_his) VALUES(?,?,?,?,?,?,?,?,?,?)');
    $req2->execute(Array($idimpr, $_POST['index_init_phbn'], $_POST['index_init_phbn'],
    $_POST['index_init_phclr'], $_POST['index_init_phclr'],
    $_POST['index_init_impbn'], $_POST['index_init_impbn'],
    $_POST['index_init_impclr'], $_POST['index_init_impclr'],$datee));

    
    if ($req) {
        header("Location: imprimante.php?ajout=yes");
    }
    else {
        header("Location: imprimante.php?ajout=no");
    }
   
}

if (isset($_GET['mod']) && $_GET['mod'] == "modifier"){
    $ajour = $bdd->prepare('UPDATE imprimente SET nomimpr = ?,prixphbn = ?,priximbn=?,prixphclr=?,priximclr=? WHERE idimpr = ?');
    $ajour->execute(array($_GET['nomimpr'],$_GET['prixphbn'],$_GET['priximbn'],$_GET['prixphclr'],$_GET['priximclr'],$_GET['idimpr']));
    $ajour->closeCursor();

    header("Location: imprimante.php?modif=yes");
}
if (isset($_GET['sup']) && $_GET['sup'] == "supprimer"){
    $supp = $bdd->prepare('DELETE FROM imprimente WHERE idimpr = ?');
    $supp->execute(array($_GET['idimpr']));
    $supp->closeCursor();

    header("Location: imprimante.php?supp=yes");
}


?>