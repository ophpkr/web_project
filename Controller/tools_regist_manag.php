<?php require_once('../Modele/registration.php'); ?>

<?php

/* ----------------Num of current tournament----------------------*/
function getNumCourTourn()
{
    $NumTourn = getCurrentTourn()[0] -> numTourn;
    
    return $NumTourn;
    
}


/* ------------------Concerning unpaid registrations------------------*/

function getNumRegNotPaidAsc()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =regNotPaid($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->numReg);
        }
    return $list;
}

function getNameRegNotPaidAsc()
{
    $list = array();
   
    $numcourTourn = getNumCourTourn();
    $data =regNotPaid($numcourTourn); 
    
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->name);
        }
    return $list;
}

function getFirstnameRegNotPaidAsc()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =regNotPaid($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->firstName);
        }
    return $list;
}



$numRegNotPaid = getNumRegNotPaidAsc();
$nameRegNotPaid = getNameRegNotPaidAsc();
$fNameRegNotPaid = getFirstnameRegNotPaidAsc();


/* ------------------Concerning ungiven parental authorisation------------------*/




function getFirstnameRegNotAP()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =notAP($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->firstName);
        }
    return $list;
}


function getNameRegNotAP()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =notAP($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->name);
        }
    return $list;
}

function getNumRegNotAP()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =notAP($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->numReg);
        }
    return $list;
}

$numRegNotAP = getNumRegNotAP();
$nameRegNotAP = getNameRegNotAP();
$fNameRegNotAP = getFirstnameRegNotAP();


/* ------------------Concerning contestants who ended their registration------------------*/











?>
