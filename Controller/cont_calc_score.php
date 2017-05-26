<?php require_once('../Modele/course.php'); ?>
<?php require_once('../Modele/result.php'); ?>
<?php require_once('../Modele/registration.php'); ?>
<?php require_once('cont_num_current_tourn.php'); ?>

<?php

$numtourn = 15;

function calcScoreTot($numtourn, $numreg)
{

    $data = getInfosScore($numreg, $numtourn);
    $score = 0;

    if(!empty($data))
    {        
               
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

print_r(sepScore($numtourn));

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

print_r(sepReg($numtourn));

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

print_r(orderRegScore($numtourn));

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

print_r(getNamesScore($numtourn));

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

print_r(getfNamesScore($numtourn));

function getSexe($numtourn)
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

print_r(getSexe($numtourn));

function getBib($numtourn)
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

print_r(getBib($numtourn));

?>