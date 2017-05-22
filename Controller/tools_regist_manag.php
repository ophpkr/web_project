<?php require_once('../Modele/registration.php'); ?>
<?php require_once('num_current_tourn.php'); ?>
<?php


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


function getFirstnameRegOk()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =getRegistrationOk($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->firstName);
        }
    return $list;
}


function getNameRegOk()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =getRegistrationOk($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->name);
        }
    return $list;
}

function getNumRegOk()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =getRegistrationOk($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->numReg);
        }
    return $list;
}

$numRegOk = getNumRegOk();
$nameRegOk = getNameRegOk();
$fNameRegOk = getFirstnameRegOk();







?>
