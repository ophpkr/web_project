<?php require_once('../Modele/tournament.php');


function convertToDate($day, $month, $year)
{
    if(strlen($day) == 1)
    {
        $day = '0' . $day;
    }
    if(strlen($month) == 1)
    {
        $month = '0' . $month;
    }
    
    $date = $year . '-' . $month . '-' . $day;
    return $date;
}

function getNamesTourn()
{
    $listNameTourn = getNameTournamentsByDateDesc();

    $listNames = array();
    
    for($i=0; $i< sizeof($listNameTourn); $i++)
        {
            array_push($listNames, $listNameTourn[$i]->nameTourn);
        }
    
    return $listNames;
    
}



function getNumsTourn()
{
    $listNumTourn = getNumTournamentsByDateDesc();

    $listNum = array();
    
    for($i=0; $i< sizeof($listNumTourn); $i++)
        {
            array_push($listNum, $listNumTourn[$i]->numTourn);
        }
    
    return $listNum;
    
}

function compareDates($dFirst, $dSecond) //we want the first one being littler than the second one
{
    $datetime1 = new DateTime($dFirst);
    $datetime2 = new DateTime($dSecond);

    return($datetime1 <= $datetime2);
    
}

$namesTourndesc = getNamesTourn();
$numTourndesc = getNumsTourn();



?>