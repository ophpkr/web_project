<?php
require_once("../Modele/db_connect.php");
require_once("../Modele/tournament.php");
require_once("../Modele/round.php");
require_once("../Controller/tools.php");


//$a = getTournament();

/*$listNameTourn = getNameTournaments();
//print_r($listNameTourn);
/*for($i=0; $i<sizeof($a); $i++)
{
    echo $a[$i]->nameTourn . '\n';
}*/
/*
$x=array();


for($i=0; $i< sizeof($listNameTourn); $i++)
    {
        //print_r($listNameTourn[$i]);
        //echo '---';
        array_push($x, $listNameTourn[$i]->nameTourn);
        //echo'coucou';
        print_r($x);
        //echo $x;
    }
    */
$r = getNumTournamentsByDateDesc();
var_dump($r);
echo '---';
var_dump $r->numTourn;

/*
$d1 = '2015-02-03';
$d2 = '2015-02-05';

$r = compareDates($d2, $d1);
echo $r;
//echo $r;*/

    
?>