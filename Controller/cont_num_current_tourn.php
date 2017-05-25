<?php require_once('../Modele/tournament.php'); ?>

<?php

/* ----------------Num of current tournament----------------------*/
function getNumCourTourn()
{
    if(existsCurrentTourn()!=1)
    {
        $NumTourn = NULL;
    }
    else
    {
        $NumTourn = getCurrentTourn()[0] -> numTourn;
    }
    
    return $NumTourn;
    
}
?>