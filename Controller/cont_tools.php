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
    if(existsCurrentTourn()!=1)
    {
        $dStart = '';
    }
    else
    {
        $dStart = getCurrentTourn()[0] -> dStart;
    }
    
    return $dStart;
    
}

function getdEndCourTourn()
{
    if(existsCurrentTourn()!=1)
    {
        $dEnd = '';
    }
    else
    {
        $dEnd = getCurrentTourn()[0] -> dEnd;
    }
    
    return $dEnd;
    
}

function getNameCourTourn()
{
    if(existsCurrentTourn()!=1)
    {
        $NameTourn = '';
    }
    else
    {
         $NameTourn = getCurrentTourn()[0] -> nameTourn;
    }   
    
    return $NameTourn;
    
}

function writeInFrench($date)
{
    $year = date("Y", strtotime($date));
    $month = date("m", strtotime($date));
    $day = date("d", strtotime($date));
    
    if($month == 1)
    {
        $month = 'janvier';
    }
    elseif($month == 2)
    {
        $month = 'février';
    }
    elseif($month == 3)
    {
        $month = 'mars';
    }
    elseif($month == 4)
    {
        $month = 'avril';
    }
    elseif($month == 5)
    {
        $month = 'mai';
    }
    elseif($month == 6)
    {
        $month = 'juin';
    }
    elseif($month == 7)
    {
        $month = 'juillet';
    }
    elseif($month == 8)
    {
        $month = 'août';
    }
    elseif($month == 9)
    {
        $month = 'septembre';
    }
    elseif($month == 10)
    {
        $month = 'octobre';
    }
    elseif($month == 11)
    {
        $month = 'novembre';
    }
    else
    {
        $month = 'décembre';
    }
    
    return ($day . ' ' . $month . ' ' . $year);
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

$sDateFrenchCourTourn = writeInFrench($dStartCurrentTourn);
$eDateFrenchCourTourn = writeInFrench($dEndCurrentTourn);

function announceDateCourTourn()
{
    $dStartCurrentTourn = getdStartCourTourn();
    $dEndCurrentTourn = getdEndCourTourn();

    $sDateFrenchCourTourn = writeInFrench($dStartCurrentTourn);
    $eDateFrenchCourTourn = writeInFrench($dEndCurrentTourn);
    if(existsCurrentTourn()!=1)
    {
        return NULL;
    }
    else
    {
        return 'La prochaine compétition aura lieu du ' . $sDateFrenchCourTourn . 'au ' . $eDateFrenchCourTourn;
    }
}

$an = announceDateCourTourn();

?>