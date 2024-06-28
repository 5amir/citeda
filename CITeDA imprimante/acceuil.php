<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="acceuil.css">
    <link rel="stylesheet" type="text/css" href="header.css">
    <title>Acceuil</title>
</head>
<body>
<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
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

<div class="info">
    
    <label for="nom">Nom:</label><?php echo($_SESSION['nom']);?>
    <br><br>
    <label for="email">Email:</label> <?php echo($_SESSION['email']);?>
    <br><br>
    <label for="status">Status:</label> <?php echo($_SESSION['profil']);?>
</div>

<div class="container">

<?php

    if (isset($_GET['enr']) && $_GET['enr']=="yes") {
        ?>
        
        <div style="background:whitesmoke; padding:30px;">
            <h3 style="color:green;">Enregistrement effectué avec succès</h3>
        </div>

        <?php 
    }elseif(isset($_GET['enr']) && $_GET['enr']=="no")
    {
        ?>
        
        <div style="background:whitesmoke; padding:30px;">
            <h3 style="color:red;">Une erreur est survenu</h3>
        </div>

        <?php  
    }
?>

     <form method="post" action="traitEng.php">

        
        <div class="formulaire">
            <center class="titre">
                <h1>Enregistrement</h1>
            </center>
            <hr>
            <div>
            
                
                <div class="ligne">
                    <label>Imprimante </label>
                    <select name="imprimante" >
                        <option value=""></option>
                    <?php
                                $reqmat = $bdd->query('SELECT * FROM imprimente');
                                 while ($donmat = $reqmat->fetch())
                                {
                                ?>
                                 <option value="<?php echo $donmat['idimpr']; ?>"><?php echo $donmat['nomimpr']; ?></option>
                                <?php
                                }
                                $reqmat->closeCursor();
                            ?>
                    </select>
                </div>
                <hr>
                <div class="ligne">
                    <label>Photocopie </label>
                    <div class="supp">
                        <div>
                         <input type="text" class="inp" value="B/N" readonly>
                         <input type="number" name="indexphotocopieBn" class="inp" required>                  
                        </div>
                        <div>
                         <input type="text" class="inp clr" value="Clr" readonly>
                         <input type="number" name="indexphotocopieClr" class="inp" required>
                        </div>
                     </div>
                    
                </div>
                <hr>
                <div class="ligne">
                    <label>Impression </label>
                    <div class="supp">
                        <div>
                         <input type="text" class="inp" value="B/N" readonly>
                         <input  type="number" name="indeximpressionBn" class="inp" required>                  
                        </div>
                        <div>
                         <input type="text" class="inp clr" value="Clr" readonly>
                         <input  type="number" name="indeximpressionClr" class="inp" required>
                        </div>
                     </div>
                    </div>
                
                <hr>
                <div class="btn">
                    <button class="btn-enr" name="enregistrer">Enregistrer</button>
                </div>
            </div>
        </div>
    </form>
    <div>
        <a href="logout.php"><button class="btn-dec">Se deconnecter</button></a>
    </div>
    </div>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var selectImprimante = document.querySelector('select[name="imprimante"]');
    var inputsIndex = document.querySelectorAll('input[name^="index"]');

    selectImprimante.addEventListener('change', function() {
        var selectedImprimante = selectImprimante.value;

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_latest_indexes.php?imprimante=' + selectedImprimante, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                inputsIndex[0].value = response.n_i_phbn;
                inputsIndex[0].setAttribute('min', response.n_i_phbn);
                 
                inputsIndex[1].value = response.n_i_phclr;
                inputsIndex[1].setAttribute('min', response.n_i_phclr);
                
                inputsIndex[2].value = response.n_i_impbn;
                inputsIndex[2].setAttribute('min', response.n_i_impbn);
                
                inputsIndex[3].value = response.n_i_impclr;
                inputsIndex[3].setAttribute('min', response.n_i_impclr);
            }
        };
        xhr.send();
    });
});

</script>

</html>