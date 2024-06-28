<?php
// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=citeda', 'root', '');

// Récupération de l'ID de l'imprimante depuis la requête AJAX
$idImprimante = $_GET['imprimante'];

// Requête pour récupérer les derniers index pour cette imprimante
$query = "SELECT * FROM historique WHERE idimpr = :idImprimante ORDER BY date_his DESC LIMIT 1";
$stmt = $bdd->prepare($query);
$stmt->execute(array(':idImprimante' => $idImprimante));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Renvoyer les données sous forme de JSON
echo json_encode($result);
?>
