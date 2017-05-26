<?php require_once('../Modele/tournament.php'); ?>

<?php

deleteTourn($_GET['numtourn']);
header('Location : ../Vue/tournament_management.php');
?>