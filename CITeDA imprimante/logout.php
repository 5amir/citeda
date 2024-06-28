<?php

session_start();

unset($_SESSION['id']);//unset() détruit une variable, si vous enregistrez aussi l'id du membre (par exemple) vous pouvez comme avec isset(), mettre plusieurs variables séparés par une virgule:


header("Location: index.php");//redirection vers le formulaire de connexion dans 5 secondes

?>