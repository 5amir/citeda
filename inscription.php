<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" type="text/css" href="inscription.css">
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
<?php
        if (isset($_GET['ajout']) && $_GET['ajout']=="yes") {
            ?>
            
            <div style="background:whitesmoke;margin:15px; padding:15px; text-align:center;">
                <h3 style="color:green;">Inscription effectué avec succès</h3>
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
<div class="plage">
    <div class="gauche">
    <div>
     <form method="post" action="traitins.php">
     
        <div class="formulaire">
            <div>
            <center class="titre">
                <h1>Ajouter un utilisateur </h1>
            </center>
                <div class="ligne">
                    <label>Nom : </label>
                    <input type="text" name="nom" class="inp" required>
                </div>
                <div class="ligne">
                    <label>Email :</label>
                    <input type="email" name="email" class="inp" required>
                </div>
                <div class="ligne">
                    <label>Mot de passe :</label>
                    <input type="password" name="password" class="inp" required>
                </div>
                <div class="ligne">
                    <label>Status : </label>
                    <div>
                        <input type="radio" name="profil" value="PDG" id=""><span>PDG</span>
                    </div>
                    <div>
                        <input type="radio" name="profil" value="Sécrétaire" id=""><span>Sécrétaire</span>
                    </div>
                </div>
                
                
                <div class="btn">
                    <button class="btn2" name="inscrit">Inscrit</button>
                </div>
            </div>
        </div>
    </form>
    </div>
    </div>
    <div class="droite">
    <?php
        if(isset($_GET['supp']) && $_GET['supp']=="yes")
        {
            ?>
            
            <div style="background:whitesmoke;margin:15px; padding:15px;text-align:center;">
                <h3 style="color:red;">Suppression réussir</h3>
            </div>
        
            <?php  
        }
        ?>
        <div>
            
        </div>
        <?php
            $req = $bdd->prepare('SELECT * FROM users');
            $req->execute();
            while ($user = $req->fetch()){
                ?>
                  <div class="formu">
                    <div class="corp">
                     <div class="lab"><?php echo $user['nom']?></div>
                     <div class="lab"><?php echo $user['email']?></div>
                     <div class="lab"><?php echo $user['profil']?></div>
                       <a href="traitins.php?iduser=<?php echo $user['iduser']?>&sup=supprimer"><input type="submit" name="sup" value="supprimer" class="bas-btn-sup" style="width:80px;height: 25px;"></a>
                    </div>
                  </div>
        
                <?php
            }

        ?>
       
        
    </div>
</div>


</body>
</html>