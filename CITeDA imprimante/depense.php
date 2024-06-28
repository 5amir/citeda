<?php
session_start();

include"header.php";

try {
    $bdd = new PDO('mysql:host=localhost;dbname=citeda', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

date_default_timezone_set('Africa/Lagos');
$datee = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $motif = $_POST['motif'];
    $montant = $_POST['montant'];

    $req = $bdd->prepare('INSERT INTO depenses (motif, montant, date_depense) VALUES (?, ?, ?)');
    $req->execute(array($motif, $montant, $datee));

    $_SESSION['message'] = 'Dépense ajoutée avec succès';
    header('Location: depense.php');
    exit();
}

$depenses = $bdd->query('SELECT * FROM depenses ORDER BY date_depense DESC')->fetchAll(PDO::FETCH_ASSOC);
$totalDepenses = $bdd->query('SELECT SUM(montant) as total FROM depenses')->fetch(PDO::FETCH_ASSOC)['total'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="header.css">
    <title>Gestion des Dépenses</title>
    <style>
        .container {
            margin-top: 50px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        .card {
            border: 1px solid #007bff;
            border-radius: 15px;
            padding: 20px;
            background-color: white;
            margin-bottom: 20px;
        }
        .card-header {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 15px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .alert {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
            font-size: 18px;
            text-align: right;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert">
                    <?= $_SESSION['message'] ?>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
            <div class="card-header">Enregistrer une Dépense</div>
            <div class="card-body">
                <form method="POST" action="depense.php">
                    <div class="form-group">
                        <label for="motif">Motif de la Dépense</label>
                        <input type="text" name="motif" id="motif" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="montant">Montant</label>
                        <input type="number" step="0.01" name="montant" id="montant" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-custom btn-block">Ajouter</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Liste des Dépenses</div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Motif</th>
                            <th>Montant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($depenses as $depense): ?>
                            <tr>
                                <td><?= $depense['date_depense'] ?></td>
                                <td><?= $depense['motif'] ?></td>
                                <td><?= number_format($depense['montant'], 2) ?> FCFA</td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="total">
                            <td colspan="2">Total des Dépenses :</td>
                            <td><?= number_format($totalDepenses, 2) ?> FCFA</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
