<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

     <form method="post" action="auth.php">

        
        <div class="formulaire">
            <center class="titre">
                <h1>Enregistrement</h1>
            </center>
            <hr>
            <div>
            
                
                <div class="ligne">
                    <label>Imprimante </label>
                    <select name="Imprimante" id="">
                    <option ></option>
                        <option value="">Black jack</option>
                        <option value="">HP</option>
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
                    <button class="btn2" name="enregistrer">Enregistrer</button>
                </div>
            </div>
        </div>
    </form>
    </div>

</body>
</html>