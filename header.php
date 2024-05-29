<header>
        <div class="haut">
            <img src="logo.jpg" width="100" height="100" alt="">
            <h1 style="letter-spacing: 6px;">CITeda</h1>
        </div>
        <hr>
        <?php
        session_start();
       $profil = $_SESSION['profil'];
if ($profil=="PDG") {
    ?>
    <div class="navv">
            <ul>
                <li><a href="">Acceuil</a></li>
                <li><a href="">Inscription</a></li>
                <li><a href="">Imprimantes</a></li>
                <li><a href="">Bilan</a></li>
            </ul>
            <hr>
        </div>
<?php
}
?>
        
 </header>