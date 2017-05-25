<?php require_once("../Modele/tournament.php"); ?>
<?php require_once("./cont_num_current_tourn.php"); ?>
<?php require_once("./cont_tools.php"); ?>

<?php

if(isset($_POST['newsdate']) AND isset($_POST['newedate']))
{
    //newsdate (=newdate of start) has to be before the newedate (= new date of end)
    if(!compareDates($_POST['newsdate'], $_POST['newedate']))
    {
        $msg = "La date de fin est avant la date de début de la compétition";
        header("Location: ../Vue/tournament_management.php?msg=" .$msg);
        exit();
        
    }
    //newsdate  has to be after the current date
    if(!compareDates(date("Y-m-d"), $_POST['newsdate']))
    {
        $msg = "La compétition que vous voulez créer a une date passée";
        header("Location: ../Vue/tournament_management.php?msg=" .$msg);
        exit();
    }

    $numcourtourn = getNumCourTourn();
    //update the tournament
    updateTourn($_POST['newsdate'], $_POST['newedate'], $numcourtourn);
    $msg = "La compétition a bien été modifiée";
    header("Location: ../Vue/tournament_management.php?msg=" .$msg);
    exit();
}
else
{
    $msg = "Vous n'avez pas rempli tous les champs";
    header("Location: ../Vue/tournament_management.php?msg=" .$msg);
    exit();
}   
   
   
   
   
?>