<?php require_once('../Modele/registration.php'); ?>
<?php require_once('./cont_num_current_tourn.php'); ?>

<?php

    $numcourtourn = getNumCourTourn();
    setAutPar($_GET['numreg']);
    
    $msg = "Votre action a bien été prise en compte";
    header("Location: ../Vue/tournament_management.php?msg=" .$msg);
    exit();

?>