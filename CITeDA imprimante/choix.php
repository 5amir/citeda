<?php
    session_start();

    if (!isset($_SESSION['id'])) {
        header("Location: index.php");
        exit();
    }
    
    if ($_SESSION['profil'] != 'PDG') {
        header("Location: acceuil.php");
        exit();
    }

    include('header.php');
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="header.css">
    <title>Choix de bilan</title>
    <style>
        .tout {
    font-family: 'Arial', sans-serif;
    background-color: #f0f0f0;
    margin: 50px;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px;
}

.imprimante-btn, .all-imprimantes-btn, .caisse-btn {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 20px 40px;
    font-size: 20px;
    cursor: pointer;
    border-radius: 15px;
    margin: 10px;
    text-decoration: none;
    display: inline-block;
    transition: transform 0.3s, background-color 0.3s;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.imprimante-btn:nth-child(odd) {
    background-color: #28a745;
}

.imprimante-btn:nth-child(even) {
    background-color: #17a2b8; 
}

.all-imprimantes-btn {
    background-color: #ffc107;
    color: black;
}
 .caisse-btn {
    background-color: #007bff;
    color: white;
}

.imprimante-btn:hover, .all-imprimantes-btn:hover, .caisse-btn:hover {
    transform: scale(1.3);
    box-shadow: 0 6px 8px black;
}



    </style>
</head>
<body>
    <div class="tout">

    
    <?php

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=citeda', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // Récupération des imprimantes
    $imprimantes = $bdd->query("SELECT idimpr, nomimpr FROM imprimente")->fetchAll(PDO::FETCH_ASSOC);

    echo '<div class="container">';
    foreach ($imprimantes as $imprimante): ?>
       <a href="prebilan.php?imprimante_id=<?= $imprimante['idimpr'] ?>"> 
        <button class="imprimante-btn">
            <?= $imprimante['nomimpr'] ?>
        </button>
        </a>
    <?php endforeach; 
    echo '</div>';
    ?>
    <a href="bilan.php">
        <button class="all-imprimantes-btn">Toutes les imprimantes</button>
    </a>
    <a href="caisse.php">
        <button class="caisse-btn">Caisse</button>
    </a>

    </div>
</body>
</html>
