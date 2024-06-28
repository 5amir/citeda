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

try {
    $bdd = new PDO('mysql:host=localhost;dbname=citeda', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT * FROM imprimente');
$req->execute();

$totalDepenses = $bdd->query('SELECT SUM(montant) as total FROM depenses')->fetch(PDO::FETCH_ASSOC)['total'];

include "header.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="header.css">
    <title>Caisse</title>
    <style>
.container{
    margin-top:100px;
}
table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}

table th {
    background-color: #4CAF50;
    color: white;
}

table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tfoot tr {
    background-color: #4CAF50;
    color: white;
}

table tfoot td {
    font-weight: bold;
}

tfoot tr td:first-child {
    text-align: right;
}

.table-container{
    margin-top:30px;
    display:flex;
}

.total-caisse{
    position:fixed;
    right:10px;
    top:190px;
    background-color: #0AF;
    color:white;
    padding:10px;
    border-radius:5px;
    box-shadow:5px 5px 5px rgba(0,0,0,0.5);
}

.total-caisse:hover{
    transform: scale(1.05);
    box-shadow:5px 5px 5px black;
}



    </style>
</head>
<body>
    <div class="container">
        <div class="total-depenses">
            <h2><span style="margin-right:50px;">Total des dépenses:</span> <?= number_format($totalDepenses, 2) ?> FCFA
             <span  style="font-size:10px;"><a href="depense.php">Savoir plus</a></span></h2>        
        </div>
        <div class="table-container">
         <h2 style="margin-right:50px;">Total des Imprimantes:</h2>
            <table>
                <thead>
                    <tr>
                        <th>Imprimante</th>
                        <th>Photocopie Blanc/Noir</th>
                        <th>Photocopie Couleur</th>
                        <th>Impression Blanc/Noir</th>
                        <th>Impression Couleur</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="totalsBody">
                <?php
                $total_caisse_impr = 0;
                while ($imprimante = $req->fetch()) {
                    $query = "SELECT h.date_his, i.nomimpr AS imprimante, h.d_i_phbn, h.n_i_phbn, h.d_i_phclr, 
                        h.n_i_phclr, h.d_i_impbn, h.n_i_impbn, h.d_i_impclr, h.n_i_impclr,
                        i.prixphbn, i.priximbn, i.prixphclr, i.priximclr
                        FROM historique h
                        JOIN imprimente i ON h.idimpr = i.idimpr
                        WHERE h.idimpr = ?";
                    $stmt = $bdd->prepare($query);
                    $stmt->execute([$imprimante['idimpr']]);
                    $enregistrements = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    $total_general = 0;
                    $bilan_phbn = 0;
                    $bilan_phclr = 0;
                    $bilan_impbn = 0;
                    $bilan_impclr = 0;

                    foreach ($enregistrements as $enregistrement) {
                        $total_phbn = ($enregistrement['n_i_phbn'] - $enregistrement['d_i_phbn']) * $enregistrement['prixphbn'];
                        $total_phclr = ($enregistrement['n_i_phclr'] - $enregistrement['d_i_phclr']) * $enregistrement['prixphclr'];
                        $total_impbn = ($enregistrement['n_i_impbn'] - $enregistrement['d_i_impbn']) * $enregistrement['priximbn'];
                        $total_impclr = ($enregistrement['n_i_impclr'] - $enregistrement['d_i_impclr']) * $enregistrement['priximclr'];
                        $total = $total_phbn + $total_phclr + $total_impbn + $total_impclr;
                        $total_general += $total;
                        $bilan_phbn += $total_phbn;
                        $bilan_phclr += $total_phclr;
                        $bilan_impbn += $total_impbn;
                        $bilan_impclr += $total_impclr;
                    }
                    ?>
                    <tr>
                        <td><?= $imprimante['nomimpr'] ?></td>
                        <td><?= number_format($bilan_phbn, 2) ?> FCFA</td>
                        <td><?= number_format($bilan_phclr, 2) ?> FCFA</td>
                        <td><?= number_format($bilan_impbn, 2) ?> FCFA</td>
                        <td><?= number_format($bilan_impclr, 2) ?> FCFA</td>
                        <td><?= number_format($total_general, 2) ?> FCFA</td>
                    </tr>
                    <?php
                    $total_caisse_impr += $total_general;
                }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">Total imprimante</td>
                        <td><?= number_format($total_caisse_impr, 2) ?> FCFA</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
        <div class="total-caisse">
            <h2><span >Caisse :</span> <?= number_format($total_caisse_impr - $totalDepenses, 2) ?> FCFA</h2>
        </div>
</body>
</html>
