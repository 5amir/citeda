<header>
        <div class="haut">
            <img src="logo.jpg" width="100" height="100" alt="">
            <h1 style="letter-spacing: 6px;">CITeDA</h1>
        </div>
        <hr>
        <?php
       $profil = $_SESSION['profil'];
if ($profil=="PDG") {
    ?>
    <div class="navv">
            <ul>
                <li><a href="acceuil.php">Acceuil</a></li>
                <li><a href="">Inscription</a></li>
                <li><a href="imprimante.php">Imprimantes</a></li>
                <li><a href="">Bilan</a></li>
            </ul>
            <hr>
        </div>
<?php
}
?>
        
 </header>