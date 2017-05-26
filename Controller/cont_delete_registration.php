<?php require_once('../Modele/registration.php'); ?>

<?php


deleteRegistration($_GET['numreg']);

header('Location : ../Vue/registration_management.php'); 


?>