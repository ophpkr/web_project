<?php require_once("../Modele/tournament.php"); ?>
<?php require_once("tools.php"); ?>


<?php

if(isset($_POST['nametourn']) AND isset($_POST['sdate']) AND isset($_POST['edate']))
{
    if(!preg_match('/^[0-9a-zA-Z-\s]+$/', $_POST['nametourn']))
        {
            //$msg : the message returned to the user when the registration has something wrong
            $msg = "Nom de compétiotion incorrect";
            header("Location: ../Vue/tournament_management.php?msg=" .$msg);
        }
        
    if(!compareDates($_POST['sdate'], $_POST['edate']))
    {
        $msg = "La date de fin est avant la date de début de la compétition";
        header("Location: ../Vue/tournament_management.php?msg=" .$msg);
    }
    
    if(!compareDates(date("Y-m-d"), $_POST['sdate']))
    {
        $msg = "La compétition que vous voulez créer a une date passée";
        header("Location: ../Vue/tournament_management.php?msg=" .$msg);
    }

    addTournament($_POST['nametourn'], $_POST['sdate'], $_POST['edate']);
    $msg = "La compétition a bien été créée";
    header("Location: ../Vue/tournament_management.php?msg=" .$msg);
}
   
   
   
   
   
?>