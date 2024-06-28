<header>
        <div class="haut">
            <img src="logo.jpg" width="100" height="100" alt="">
            <h1  style="text-align:center;">
                <span style="letter-spacing:10px;">CITeDA</span><br>
                <span>Centre Informatique de Technologie et de Développement d'Application</span>
            </h1>
            
        </div>
        <hr>
        <?php
       $profil = $_SESSION['profil'];
if ($profil=="PDG") {
    ?>
    <div class="navv">
            <ul>
                <li><a href="acceuil.php">Acceuil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="imprimante.php">Imprimantes</a></li>
                <li><a href="choix.php">Bilan</a></li>
                <li><a href="depense.php">Dépenses</a></li>
            </ul>
            <hr>
        </div>
<?php
}
?>
        
 </header>