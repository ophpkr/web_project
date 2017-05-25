<?php require_once('../Modele/registration.php'); ?>
<?php require_once('./cont_num_current_tourn.php'); ?>

<?php

    $numcourtourn = getNumCourTourn();
    //put paid at 1 in registration
    setPaid($_GET['numreg']);
    
    //give bibmax+1 as bib
    $bibmax = getMaxBib($numcourtourn);
    $bibmax = $bibmax[0] -> bibmax;
    
    setBib($bibmax + 1, $_GET['numreg']);
    
    $msg = "Votre action a bien été prise en compte";
    header("Location: ../Vue/tournament_management.php?msg=" .$msg);
    exit();
?>