<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

if ($_SESSION['profil']!='PDG') {
    header("Location: acceuil.php");
    exit();
}

try {
    $bdd = new PDO('mysql:host=localhost;dbname=citeda', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Récupération des imprimantes
$imprimantes = $bdd->query("SELECT idimpr, nomimpr FROM imprimente")->fetchAll(PDO::FETCH_ASSOC);

// Initialisation des filtres
$imprimante_id = isset($_GET['imprimante_id']) ? $_GET['imprimante_id'] : '';
$date_debut = isset($_GET['date_debut']) ? $_GET['date_debut'] : '';
$date_fin = isset($_GET['date_fin']) ? $_GET['date_fin'] : '';

// Création de la requête SQL avec les filtres
$query = "SELECT e.dateajout, i.nomimpr AS imprimante, e.nbrphbn, e.nbrphclr, e.nbrimpbn, e.nbrimpclr,
          i.prixphbn, i.priximbn, i.prixphclr, i.priximclr
          FROM enregistrer e
          JOIN imprimente i ON e.idimpr = i.idimpr
          WHERE 1";

$params = array();

if ($imprimante_id) {
    $query .= " AND e.idimpr = ?";
    $params[] = $imprimante_id;
}
if ($date_debut) {
    $query .= " AND e.dateajout >= ?";
    $params[] = $date_debut;
}
if ($date_fin) {
    $query .= " AND e.dateajout <= ?";
    $params[] = $date_fin;
}

$stmt = $bdd->prepare($query);
$stmt->execute($params);
$enregistrements = $stmt->fetchAll(PDO::FETCH_ASSOC);

include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <link rel="shortcut icon" href="logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" type="text/css" href="bilan.css">
    <title>Bilan des Imprimantes</title>
</head>
<body>
    <h1>Bilan des Imprimantes</h1>

    <form method="GET" action="bilan.php">
        <label for="imprimante_id">Imprimante :</label>
        <select name="imprimante_id" id="imprimante_id">
            <option value="">Toutes</option>
            <?php foreach ($imprimantes as $imprimante): ?>
                <option value="<?= $imprimante['idimpr'] ?>" <?= ($imprimante_id == $imprimante['idimpr']) ? 'selected' : '' ?>>
                    <?= $imprimante['nomimpr'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <label for="date_debut">Date de début :</label>
        <input type="date" name="date_debut" id="date_debut" value="<?= $date_debut ?>">
        
        <label for="date_fin">Date de fin :</label>
        <input type="date" name="date_fin" id="date_fin" value="<?= $date_fin ?>">

        <button type="submit">Filtrer</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Date</th>
                <th>Imprimante</th>
                <th>Photocopies Blanc/Noir</th>
                <th>Photocopies Couleur</th>
                <th>Impressions Blanc/Noir</th>
                <th>Impressions Couleur</th>
                <th>Total Photocopies Blanc/Noir</th>
                <th>Total Photocopies Couleur</th>
                <th>Total Impressions Blanc/Noir</th>
                <th>Total Impressions Couleur</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total_general = 0;
            foreach ($enregistrements as $enregistrement): 
                $total_phbn = $enregistrement['nbrphbn'] * $enregistrement['prixphbn'];
                $total_phclr = $enregistrement['nbrphclr'] * $enregistrement['prixphclr'];
                $total_impbn = $enregistrement['nbrimpbn'] * $enregistrement['priximbn'];
                $total_impclr = $enregistrement['nbrimpclr'] * $enregistrement['priximclr'];
                $total = $total_phbn + $total_phclr + $total_impbn + $total_impclr;
                $total_general += $total;
            ?>
                <tr>
                    <td><?= $enregistrement['dateajout'] ?></td>
                    <td><?= $enregistrement['imprimante'] ?></td>
                    <td><?= $enregistrement['nbrphbn'] ?></td>
                    <td><?= $enregistrement['nbrphclr'] ?></td>
                    <td><?= $enregistrement['nbrimpbn'] ?></td>
                    <td><?= $enregistrement['nbrimpclr'] ?></td>
                    <td><?= number_format($total_phbn, 2) ?> FCFA</td>
                    <td><?= number_format($total_phclr, 2) ?> FCFA</td>
                    <td><?= number_format($total_impbn, 2) ?> FCFA</td>
                    <td><?= number_format($total_impclr, 2) ?> FCFA</td>
                    <td><?= number_format($total, 2) ?> FCFA</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="10">Total Général</td>
                <td><?= number_format($total_general, 2) ?> FCFA</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>

