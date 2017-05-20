<?php require_once("../Modele/tournament.php"); ?>
<?php require_once("tools.php"); ?>


<?php

if(isset($_POST['newnametourn']) AND isset($_POST['newsdate']) AND isset($_POST['newedate']))
{
    if(!preg_match('/^[0-9a-zA-Z-\s]+$/', $_POST['newnametourn']))
        {
            //$msg : the message returned to the user when the registration has something wrong
            $msg = "Nom de compétiotion incorrect";
            header("Location: ../Vue/tournament_management.php?msg=" .$msg);
        }
        
    if(!compareDates($_POST['newsdate'], $_POST['newedate']))
    {
        $msg = "La date de fin est avant la date de début de la compétition";
        header("Location: ../Vue/tournament_management.php?msg=" .$msg);
    }
    
    if(!compareDates(date("Y-m-d"), $_POST['newsdate']))
    {
        $msg = "La compétition que vous voulez créer a une date passée";
        header("Location: ../Vue/tournament_management.php?msg=" .$msg);
    }

    addTournament($_POST['newnametourn'], $_POST['newsdate'], $_POST['newedate']);
    $msg = "La compétition a bien été modifiée";
    header("Location: ../Vue/tournament_management.php?msg=" .$msg);
}
   
   
   
   
   
?>