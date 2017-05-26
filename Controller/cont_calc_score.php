<?php require_once('../Modele/course.php'); ?>
<?php require_once('../Modele/result.php'); ?>
<?php require_once('../Modele/registration.php'); ?>
<?php require_once('cont_num_current_tourn.php'); ?>

<?php

function calcScoreTot($numtourn, $numreg)
{

    $data = getInfosScore($numreg, $numtourn);
    $score = (getNumberCont($numtourn) + 1) * sumCoeffCourse($numtourn);

    if(!empty($data))
    {
        $score = 0;
            
        for($i = 0; $i < sizeof($data); $i++)
        {
            $score = $score + $data[$i] -> score;
        }
    }
     return $score;
}


function sepScore($numtourn)
{
    $scores = array();

    if(!empty(getRegistrationOk($numtourn)))
    {
        $regok = getRegistrationOk($numtourn);
        
        for($i = 0; $i < sizeof($regok); $i++)
        {
            $score = calcScoreTot($numtourn, $regok[$i] -> numReg);
            array_push($scores, $score);
        }
    }
     return $scores;
}

function sepReg($numtourn)
{
    $regs = array();

    if(!empty(getRegistrationOk($numtourn)))
    {
        $regok = getRegistrationOk($numtourn);
        
        for($i = 0; $i < sizeof($regok); $i++)
        {
            array_push($regs, $regok[$i] -> numReg);
        }
    }
     return $regs;
}

function orderRegScore($numtourn)
{
    $scores = sepScore($numtourn);
    $regs = sepReg($numtourn);
    
    for($i = 0; $i < sizeof($scores)-1; $i++)
    {
        for($j = $i+1; $j < sizeof($scores); $j++)
        {
            if($scores[$i]>$scores[$j])
            {
                $change = $regs[$i];
                $regs[$i] = $regs[$j];
                $regs[$j] = $change;
            }
        }
    }
    
    return $regs;
    
}

function orderScore($numtourn)
{
    $scores = sepScore($numtourn);
    
    for($i = 0; $i < sizeof($scores)-1; $i++)
    {
        for($j = $i+1; $j < sizeof($scores); $j++)
        {
            if($scores[$i]>$scores[$j])
            {
                $change = $scores[$i];
                $scores[$i] = $scores[$j];
                $scores[$j] = $change;
            }
        }
    }
    
    return $scores;
    
}


function getNamesScore($numtourn)
{
    $list = array();
    
    $data = orderRegScore($numtourn);
    
    for($i = 0; $i < sizeof($data); $i++)
        {
            $numreg = $data[$i];
            
            array_push($list, getInfosReg($numreg)[0] -> name);
        }
    return $list;
}


function getfNamesScore($numtourn)
{
    $list = array();
    
    $data = orderRegScore($numtourn);
    
    for($i = 0; $i < sizeof($data); $i++)
        {
            $numreg = $data[$i];
            
            array_push($list, getInfosReg($numreg)[0] -> firstName);
        }
    return $list;
}


function getSexeScore($numtourn)
{
    $list = array();
    
    $data = orderRegScore($numtourn);
    
    for($i = 0; $i < sizeof($data); $i++)
        {
            $numreg = $data[$i];
            
            array_push($list, getInfosReg($numreg)[0] -> sexe);
        }
    return $list;
}


function getBibScore($numtourn)
{
    $list = array();
    
    $data = orderRegScore($numtourn);
    
    for($i = 0; $i < sizeof($data); $i++)
        {
            $numreg = $data[$i];
            
            array_push($list, getInfosReg($numreg)[0] -> bib);
        }
    return $list;
}

$numcourtourn = getNumCourTourn();

$scorescour = orderScore($numcourtourn);
$namescour = getNamesScore($numcourtourn);
$fnamescour = getfNamesScore($numcourtourn);
$sexescour = getSexeScore($numcourtourn);
$bibscour = getBibScore($numcourtourn);


?>