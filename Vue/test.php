<?php
require_once("../Modele/db_connect.php");
require_once("../Modele/tournament.php");
require_once("../Modele/round.php");
require_once("../Controller/tools.php");
require_once("../Modele/user.php");
require_once('../Modele/registration.php');
require_once("../Controller/tools_regist_manag.php");

echo empty($nameRegNotAP);
echo $nameRegNotAP[0];

/* for($i = 0; $i<sizeof($numRegNotPaid); $i++)
{
    echo $numRegNotPaid[$i]; 
 }*/
//$numcourTourn = getNumCourTourn();
//print_r(regNotPaid($numcourTourn));
/*$list = array();
 for($i=0; $i< sizeof($contofregnotpaid); $i++)
        {
            array_push($list, $contofregnotpaid[$i]->numReg);

            print_r($contofregnotpaid[$i]->numReg);
        }
    print_r($list[);*/
/*for($i = 0; $i<sizeof($contofregnotpaid); $i++)
    {
        
        //echo sizeof($contofregnotpaid[$i]);
        print_r($contofregnotpaid[0]);
    }
    echo sizeof($contofregnotpaid);*/
        
/*$dStart = getCurrentTourn()[0] -> nameTourn;
print_r($dStart);*/
/*for($i = 0; $i < sizeof($numTournForReg); $i++)
{
 echo $numTournForReg[$i];
 echo $tournsForReg[$numTournForReg[$i]]; 
}   */        
    

//setRegistration('essai2', NULL, 0, NULL, 14, 6, 3);

/*$db = db_connection();
    
    $req = $db->prepare('INSERT INTO category(nameCat, miniAge, maxiAge)
                        VALUES(:namecat, :miniage, :maxiage)');
    
    $req->execute(array(':namecat'=>'Minime', ':miniage'=>12, ':maxiage'=>14));
	echo 'ok';*/


//getTourn(7);
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
/*
$r = getNumTournamentsByDateDesc();
var_dump($r);
echo '---';
var_dump $r->numTourn;
*/
/*
$d1 = '2015-02-03';
$d2 = '2015-02-05';

$r = compareDates($d2, $d1);
echo $r;
//echo $r;*/

/*insertion de l'admin*/
/*

$db = db_connection();    //creation of an array containing data about the contestant
   $data = array('admin', 'admin', '2000-01-01', 'H', 'aucune', '00000', 'aucune', 'admin@admin.com', NULL, 'XS', NULL, 1, 'pw_admin', $pwd);
    $req = $db->prepare('INSERT INTO contestant(name, firstName, dBirth, sexe, streetName, pCode, city, email, telNum, sizeBib, numPermit, isAdmin, login, pwd)
                       VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
   
   echo 'admin ok';
 	$req->execute($data);      

*/
    
?>