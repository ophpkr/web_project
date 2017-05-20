<?php require_once('db_connect.php'); ?>

<?php

function addContestant($name, $firstname, $date, $sexe, $streetName, $pCode, $city, $email, $phone, $sizeBib, $numPermit)
{
    $db = db_connection();
    //creation of an array containing data about the contestant
    $data = 

    $req = $db->prepare('INSERT INTO contestant(name, firstName, dBirth, sexe, streetName, pCode, city, email, telNum, sizeBib, numPermit, isAdmin)
                        VALUES(:name,:firstname,:dBirth, :sexe, :streetName, :pCode, :city, :email, :telNum, :sizeBib, :numPermit, :isAdmin)');
    
 	$req->execute(array(':name' => $name, ':firstname' => $firstname, ':dBirth' => $date, ':sexe' => $sexe,
						':streetName' => $streetName, ':pCode' => $pCode, ':city' => $city, ':email' => $email,
						':telNum' => $phone, ':sizeBib' => $sizeBib, ':numPermit' => $numPermit, ':isAdmin' => 0));      
    return 1;
    
}

function getContestants()
{
	$db = db_connection();
    
    $req = $db->prepare('SELECT *
                        FROM contestant
                        WHERE isAdmin == 0');
    
    $req->execute();
    $nameTourn = $req->fetchall(PDO::FETCH_OBJ);

    return $nameTourn;
	
}

function checkGoodAdmin($login, $pwdhash) //the password given has to be hash before
{
	$db = db_connection();
    
    $req = $db->prepare('SELECT *
                        FROM contestant
                        WHERE login =:login AND pwd=:pwd AND :isAdmin');
    
	$req->execute(array(':login' => $login,':pwd' => $pwd, ':isAdmin' => 1));
	$res=$req->rowCount();
	return $res;
}

?>