<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" type="text/css" href="imprimante.css">
    <title>Imprimantes</title>
</head>
<body>
<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

if ($_SESSION['profil']!='PDG') {
    header("Location: acceuil.php");
    exit();
}

try
{
$bdd = new PDO('mysql:host=localhost;dbname=citeda', 'root', '');

}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

 include"header.php";

 
?>

<div class="plage">
    <div class="gauche">
    <div>
     <form method="post" action="traitimpr.php">
     <?php
        if (isset($_GET['ajout']) && $_GET['ajout']=="yes") {
            ?>
            
            <div style="background:whitesmoke;margin:15px; padding:15px; text-align:center;">
                <h3 style="color:green;">Enregistrement effectué avec succès</h3>
            </div>
        
            <?php 
        }elseif(isset($_GET['ajout']) && $_GET['ajout']=="no")
        {
            ?>
            
            <div style="background:whitesmoke;margin:15px; padding:15px;text-align:center;">
                <h3 style="color:red;">Une erreur est survenu</h3>
            </div>
        
            <?php  
        }
        ?>
        <div class="formulaire">
            <div>
            <center class="titre">
                <h1>Ajout d'imprimante</h1>
            </center>
                <div class="ligne">
                    <label>Nom imprimante : </label>
                    <input type="text" name="nomimpr" class="inp" required>
                </div>
                <div class="ligne">
                    <label>Prix ph B/N : </label>
                    <input type="number" name="prixphbn" class="inp" required>
                </div>
                <div class="ligne">
                    <label>Prix ph CLR : </label>
                    <input type="number" name="prixphclr" class="inp" required>
                </div>
                <div class="ligne">
                    <label>Prix imp B/N : </label>
                    <input type="number" name="priximpbn" class="inp" required>
                </div>
                <div class="ligne">
                    <label>Prix imp CLR : </label>
                    <input type="number" name="priximpclr" class="inp" required>
                </div><br>
                <div class="ligne">
                    <label>Index init phbn : </label>
                    <input type="number" name="index_init_phbn" class="inp" required>
                </div>  
                <div class="ligne">
                    <label>Index init phclr : </label>
                    <input type="number" name="index_init_phclr" class="inp" required>
                </div>  
                <div class="ligne">
                    <label>Index init impbn : </label>
                    <input type="number" name="index_init_impbn" class="inp" required>
                </div>  
                <div class="ligne">
                    <label>Index init impclr : </label>
                    <input type="number" name="index_init_impclr" class="inp" required>
                </div>  
                
                
                <div class="btn">
                    <button class="btn2" name="ajouter">Ajouter</button>
                </div>
            </div>
        </div>
    </form>
    </div>
    </div>
    <div class="droite">
    <?php
        if (isset($_GET['modif']) && $_GET['modif']=="yes") {
            ?>
            
            <div style="background:whitesmoke;margin:15px; padding:15px; text-align:center;">
                <h3 style="color:green;">Modification effectué avec succès</h3>
            </div>
        
            <?php 
        }elseif(isset($_GET['supp']) && $_GET['supp']=="yes")
        {
            ?>
            
            <div style="background:whitesmoke;margin:15px; padding:15px;text-align:center;">
                <h3 style="color:red;">Suppression reussir</h3>
            </div>
        
            <?php  
        }
        ?>
        <div class="tete">
            <div class="lab">Nom</div>
            <div class="lab">Prix ph B/N</div>
            <div class="lab">Prix ph CLR</div>
            <div class="lab">Prix imp B/N</div>
            <div class="lab">Prix imp CLR</div>
            <div class="lab">Modifier</div>
            <div class="lab">Supprimer</div>
        </div>
        <?php
            $req = $bdd->prepare('SELECT * FROM imprimente');
            $req->execute();
            while ($imprimante = $req->fetch()){
                ?>
                  <form action="traitimpr.php" method="GET">
                    <div class="corp">
                        <input type="hidden" name="idimpr" value="<?php echo $imprimante['idimpr']; ?>">
                            <input type="text" name="nomimpr" value="<?php echo $imprimante['nomimpr']; ?>" class=" bas" style="width:50px;height: 20px;">
                            <input type="number" name="prixphbn" value="<?php echo $imprimante['prixphbn']; ?>" class=" bas" style="width:85px;height: 20px;">
                            <input type="number" name="prixphclr" value="<?php echo $imprimante['prixphclr']; ?>" class=" bas" style="width:85px;height: 20px;">
                            <input type="number" name="priximbn" value="<?php echo $imprimante['priximbn']; ?>" class=" bas" style="width:85px;height: 20px;">
                            <input type="number" name="priximclr" value="<?php echo $imprimante['priximclr']; ?>" class=" bas" style="width:85px;height: 20px;">
                            <a href="traitimpr.php?mod=oui&idimpr=<?php echo $imprimante['idimpr']; ?>
                            &nomimpr=<?php echo $imprimante['nomimpr'];?>
                            &prixphbn=<?php echo $imprimante['prixphbn'];?>
                            &prixphclr=<?php echo $imprimante['prixphclr'];?>
                            &priximbn=<?php echo $imprimante['priximbn']; ?>
                            &priximclr=<?php echo $imprimante['priximclr'];?>
                            "><input  type="submit" name="mod" value="modifier" class="bas-btn-mod" style="width:80px;height: 25px;"></a>
                            <a href="traitimpr.php?sup=supprimer&idimpr=<?php echo $imprimante['idimpr']?>"><input type="submit" name="sup" value="supprimer" class="bas-btn-sup" style="width:80px;height: 25px;"></a>
                    </div>
                  </form>
        
                <?php
            }

        ?>
       
        
    </div>
</div>


</body>
</html>