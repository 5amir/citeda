<header>
        <div class="haut">
            <img src="logo.jpg" width="100" height="100" alt="">
<<<<<<< HEAD
            <h1 style="letter-spacing: 6px;">CITeDA</h1>
        </div>
        <hr>
        <?php
=======
            <h1 style="letter-spacing: 6px;">CITeda</h1>
        </div>
        <hr>
        <?php
        session_start();
>>>>>>> 0b79c80bc5dda037b66893f2b6cb1a172a370b3d
       $profil = $_SESSION['profil'];
if ($profil=="PDG") {
    ?>
    <div class="navv">
            <ul>
<<<<<<< HEAD
                <li><a href="acceuil.php">Acceuil</a></li>
                <li><a href="">Inscription</a></li>
                <li><a href="imprimante.php">Imprimantes</a></li>
=======
                <li><a href="">Acceuil</a></li>
                <li><a href="">Inscription</a></li>
                <li><a href="">Imprimantes</a></li>
>>>>>>> 0b79c80bc5dda037b66893f2b6cb1a172a370b3d
                <li><a href="">Bilan</a></li>
            </ul>
            <hr>
        </div>
<?php
}
?>
        
 </header>