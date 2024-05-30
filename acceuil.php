<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<<<<<<< HEAD
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

=======
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <style>
        header{
        top: 0;
    }
    .haut{
        display: flex;
        justify-content: space-between;
        background-color: rgb(156, 33, 33);
        color: white;
    }
    h1{
        margin: auto;
    }
    .navv ul{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
    }

    .navv li{
        height: 22px;
        padding: 5px;
        background-color: rgb(176, 250, 5);
        color: black;
        list-style-type: none;
    }
    
    .navv li a{
        text-decoration: none;
        margin: auto;
        font-weight: bold;
    }

    a:hover{
        background-color: red;
        color: white;
        
    }
    .container {
            background:linear-gradient(250deg, #8EC5FC 0%, #E0C3FC 100%);    
            display: flex;
            flex-direction:column;
            gap:50px;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .formulaire {
            width: 500px;
            background-color: whitesmoke;
            border: 2px solid black;
            border-radius: 5px;
            padding: 30px;
            box-shadow: inset 5px 5px 5px rgba(0, 0, 0, 0.7), 5px 5px 5px rgba(0, 0, 0, 0.7);
        }

        label {
            font-weight: bold;
        }

        

        select {
            width: 200px;
            margin-left: 20px;
            border:none;
            outline:none;
            border-radius:20px;
            text-align:center;
            padding:3px;
            box-shadow: inset 3px 3px 3px rgba(0, 0, 0, 0.5), 5px 5px 5px rgba(0, 0, 0, 0.5);
        }

        .inp{
            width:100px; margin-left: 20px;
            border:none;
            outline:none;
            border-radius:20px;
            text-align:center;
            padding:3px;
            box-shadow: inset 3px 3px 3px rgba(0, 0, 0, 0.5), 5px 5px 5px rgba(0, 0, 0, 0.5);
        
        }

        .ligne {
            margin: 50px;
            display: flex;
            justify-content: space-between;
        }

        .bas {
            margin: 20px;
        }

        .btn {
            margin-top: 20px;
            display: flex;
            justify-content:center;
        }
        button{
            height: 30px;
            background-color: green;
            color:white;
            font-weight: bold;
            cursor: pointer;
            border:none;
        }
        .titre{
            display:flex;
            justify-content:space-between;
            align-items:center;
        }
        .supp{
            display:flex;
            flex-direction:column;
            gap:10px;
        }
        .clr{
            background: radial-gradient(circle at 50% 50%, #FFFFFF 0%, #000000 100%), conic-gradient(red, yellow, lime, aqua, blue, fuchsia, red);
            background-blend-mode: color-dodge, normal;;
        }
        .info{
            background:linear-gradient(250deg, #8EC5FC 0%, #E0C3FC 100%);
            padding:30px;
        }
    </style>
</head>
<body>
<?php
>>>>>>> 0b79c80bc5dda037b66893f2b6cb1a172a370b3d
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

<<<<<<< HEAD
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
=======
     <form method="post" action="auth.php">
>>>>>>> 0b79c80bc5dda037b66893f2b6cb1a172a370b3d

        
        <div class="formulaire">
            <center class="titre">
                <h1>Enregistrement</h1>
            </center>
            <hr>
            <div>
            
                
                <div class="ligne">
                    <label>Imprimante </label>
<<<<<<< HEAD
                    <select name="imprimante" >
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
=======
                    <select name="Imprimante" id="">
                    <option ></option>
                        <option value="">Black jack</option>
                        <option value="">HP</option>
>>>>>>> 0b79c80bc5dda037b66893f2b6cb1a172a370b3d
                    </select>
                </div>
                <hr>
                <div class="ligne">
                    <label>Photocopie </label>
                    <div class="supp">
                        <div>
                         <input type="text" class="inp" value="B/N" readonly>
                         <input placeholder="Nbr" type="number" name="indexphotocopieBn" class="inp" required>                  
                        </div>
                        <div>
                         <input type="text" class="inp clr" value="Clr" readonly>
                         <input placeholder="Nbr" type="number" name="indexphotocopieClr" class="inp" required>
                        </div>
                     </div>
                    
                </div>
                <hr>
                <div class="ligne">
                    <label>Impression </label>
                    <div class="supp">
                        <div>
                         <input type="text" class="inp" value="B/N" readonly>
                         <input placeholder="Nbr" type="number" name="indeximpressionBn" class="inp" required>                  
                        </div>
                        <div>
                         <input type="text" class="inp clr" value="Clr" readonly>
                         <input placeholder="Nbr" type="number" name="indeximpressionClr" class="inp" required>
                        </div>
                     </div>
                    </div>
                
                <hr>
                <div class="btn">
<<<<<<< HEAD
                    <button class="btn-enr" name="enregistrer">Enregistrer</button>
=======
                    <button class="btn2" name="enregistrer">Enregistrer</button>
>>>>>>> 0b79c80bc5dda037b66893f2b6cb1a172a370b3d
                </div>
            </div>
        </div>
    </form>
<<<<<<< HEAD
    <div>
        <a href="logout.php"><button class="btn-dec">Se deconnecter</button></a>
    </div>
=======
>>>>>>> 0b79c80bc5dda037b66893f2b6cb1a172a370b3d
    </div>

</body>
</html>