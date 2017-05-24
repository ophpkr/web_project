<?php require_once('../Modele/tournament.php');?>
<?php require_once('../Modele/registration.php');?>
<?php


function noAccent($str)

{
    $url = $str;
    $url = preg_replace('#Ç#', 'C', $url);
    $url = preg_replace('#ç#', 'c', $url);
    $url = preg_replace('#è|é|ê|ë#', 'e', $url);
    $url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
    $url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
    $url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
    $url = preg_replace('#ì|í|î|ï#', 'i', $url);
    $url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
    $url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
    $url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
    $url = preg_replace('#ù|ú|û|ü#', 'u', $url);
    $url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
    $url = preg_replace('#ý|ÿ#', 'y', $url);
    $url = preg_replace('#Ý#', 'Y', $url);
     
    return ($url);
}


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

function getdStartCourTourn()
{
    $dStart = getCurrentTourn()[0] -> dStart;
    
    return $dStart;
    
}

function getdEndCourTourn()
{
    $dEnd = getCurrentTourn()[0] -> dEnd;
    
    return $dEnd;
    
}

function getNameCourTourn()
{
    $NameTourn = getCurrentTourn()[0] -> nameTourn;;
    
    return $NameTourn;
    
}

/*function getNumCourTourn()
{
    $NumTourn = getCurrentTourn()[0] -> numTourn;;
    
    return $NumTourn;
    
}*/


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

function compareDatesStrict($dFirst, $dSecond) //we want the first one being littler than the second one
{
    $datetime1 = new DateTime($dFirst);
    $datetime2 = new DateTime($dSecond);

    return($datetime1 < $datetime2);
    
}

function TournsForReg()
{
    $a = getTournForReg();
    $array=array();
    for($i = 0; $i<sizeof($a); $i++)
    {
        $array[$a[$i] -> numTourn] = $a[$i] -> nameTourn;
    }
    
    return $array;
}

function getNumsTournForReg()
{
    $listNumTourn = getTournForReg();

    $listNum = array();
    
    for($i=0; $i< sizeof($listNumTourn); $i++)
        {
            array_push($listNum, $listNumTourn[$i]->numTourn);
        }
    
    return $listNum;
    
}









$numTourndesc = getNumsTourn();
$nameCourTourn = getNameCourTourn();
$dStartCurrentTourn = getdStartCourTourn();
$dEndCurrentTourn = getdEndCourTourn(); 


?>