<?php

function getNumTournPastDesc()
{
    $list = array();
    
    $ensTourn = getTournamentsByDateDesc();
    
    for($i = 1; $i< sizeof($ensTourn); $i++)
        {
            array_push($list, $ensTourn[$i]->numTourn);
        }
    return $list;
}

function getNameTournPastDesc()
{
    $list = array();
   
    $ensTourn = getTournamentsByDateDesc();

    
    for($i = 1; $i< sizeof($ensTourn); $i++)
        {
            array_push($list, $ensTourn[$i]->nameTourn);
        }
    return $list;
}

function getdStartTournPastDesc()
{
    $list = array();
    
    $ensTourn = getTournamentsByDateDesc();

    for($i = 1; $i< sizeof($ensTourn); $i++)
        {
            array_push($list, $ensTourn[$i]->dStart);
        }
    return $list;
}

function getdEndTournPastDesc()
{
    $list = array();
    
    $ensTourn = getTournamentsByDateDesc();

    for($i= 1 ; $i< sizeof($ensTourn); $i++)
        {
            array_push($list, $ensTourn[$i]->dEnd);
        }
    return $list;
}


$numTournPast = getNumTournPastDesc();
$nameTournPast = getNameTournPastDesc();
$dSartTournPast = getdStartTournPastDesc();
$dEndTournPast = getdEndTournPastDesc();






?>