<?php require_once('../Modele/tournament.php'); ?>

<?php

/* ----------------Num of current tournament----------------------*/
function getNumCourTourn()
{
    $NumTourn = getCurrentTourn()[0] -> numTourn;
    
    return $NumTourn;
    
}
?>