<?php require_once("../Modele/tournament.php"); ?>
<?php require_once("./num_current_tourn.php"); ?>
<?php require_once("./tools.php"); ?>

<?php

if(isset($_POST['newsdate']) AND isset($_POST['newedate']))
{
    //newsdate (=newdate of start) has to be before the newedate (= new date of end)
    if(!compareDates($_POST['newsdate'], $_POST['newedate']))
    {
        $msg = "La date de fin est avant la date de début de la compétition";
        header("Location: ../Vue/tournament_management.php?msg=" .$msg);
        exit();
        echo '1';
        
    }
    //newsdate  has to be after the current date
    if(!compareDates(date("Y-m-d"), $_POST['newsdate']))
    {
        $msg = "La compétition que vous voulez créer a une date passée";
        header("Location: ../Vue/tournament_management.php?msg=" .$msg);
        exit();
        echo '2';
    }

    $numcourtourn = getNumCourTourn();
    //update the tournament
    echo $_POST['newsdate'] . '------' . $_POST['newedate'] . '-------' . $numcourtourn;
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