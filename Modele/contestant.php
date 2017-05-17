<?php require_once('db_connect.php'); ?>

<?php

function addContestant($name, $firstname, $date, $sexe, $streetName, $pCode, $city, $email, $phone, $sizeBib, $numPermit)
{
    $db = db_connection();
    //creation of an array containing data about the contestant
    $data = array($name, $firstname, $date, $sexe, $streetName, $pCode, $city, $email, $phone, $sizeBib, $numPermit, 0, NULL, NULL);

    $req = $db->prepare('INSERT INTO contestant(name, firstName, dBirth, sexe, streetName, pCode, city, email, telNum, sizeBib, numPermit, isAdmin, login, pwd)
                        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
    
 	$req->execute($data);      
    return 1;
    
}



?>