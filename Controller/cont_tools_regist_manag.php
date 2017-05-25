<?php require_once('../Modele/registration.php'); ?>
<?php require_once('cont_num_current_tourn.php'); ?>
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


function getSexeNotPaid()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =regNotPaid($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->sexe);
        }
    return $list;
}

function getMailNotPaid()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =regNotPaid($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->email);
        }
    return $list;
}

function getNumTelNotPaid()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =regNotPaid($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->telNum);
        }
    return $list;
}

function getStreetNotPaid()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =regNotPaid($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->streetName);
        }
    return $list;
}

function getPCodeNotPaid()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =regNotPaid($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->pCode);
        }
    return $list;
}

function getCityNotPaid()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =regNotPaid($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->city);
        }
    return $list;
}


$cityNotPaid = getCityNotPaid();
$pcodeNotPaid = getPCodeNotPaid();
$streetNotPaid = getStreetNotPaid();
$telNumNotPaid = getNumTelNotPaid();
$mailNotPaid = getMailNotPaid();
$sexeNotPaid = getSexeNotPaid();


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


function getSexeNotAP()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =notAP($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->sexe);
        }
    return $list;
}

function getMailNotAP()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =notAP($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->email);
        }
    return $list;
}

function getNumTelNotAP()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =notAP($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->telNum);
        }
    return $list;
}

function getStreetNotAP()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =notAP($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->streetName);
        }
    return $list;
}

function getPCodeNotAP()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =notAP($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->pCode);
        }
    return $list;
}

function getCityNotAP()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =notAP($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->city);
        }
    return $list;
}


$cityNotAP = getCityNotAP();
$pcodeNotAP = getPCodeNotAP();
$streetNotAP = getStreetNotAP();
$telNumNotAP = getNumTelNotAP();
$mailNotAP = getMailNotAP();
$sexeNotAP = getSexeNotAP();








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

function getNumContRegOk()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =getRegistrationOk($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->numCont);
        }
    return $list;
}

$numRegOk = getNumRegOk();
$nameRegOk = getNameRegOk();
$fNameRegOk = getFirstnameRegOk();
$numContRegOk = getNumContRegOk();

function getSexeRegOk()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =getRegistrationOk($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->sexe);
        }
    return $list;
}

function getMailRegOk()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =getRegistrationOk($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->email);
        }
    return $list;
}

function getNumTelRegOk()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =getRegistrationOk($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->telNum);
        }
    return $list;
}

function getStreetRegOk()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =getRegistrationOk($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->streetName);
        }
    return $list;
}

function getPCodeRegOk()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =getRegistrationOk($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->pCode);
        }
    return $list;
}

function getCityRegOk()
{
    $list = array();
    
    $numcourTourn = getNumCourTourn();
    $data =getRegistrationOk($numcourTourn);
    for($i=0; $i< sizeof($data); $i++)
        {
            array_push($list, $data[$i]->city);
        }
    return $list;
}


$cityRegOk = getCityRegOk();
$pcodeRegOk = getPCodeRegOk();
$streetRegOk = getStreetRegOk();
$telRegOk = getNumTelRegOk();
$mailRegOk = getMailRegOk();
$sexeRegOk = getSexeRegOk();









?>






