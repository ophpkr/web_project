<?php require_once('db_connect.php'); ?>

<?php



function addContestant($name, $firstname, $date, $sexe, $streetName, $pCode, $city, $email, $phone, $sizeBib)
{
   $db = db_connection();    //creation of an array containing data about the contestant
   $data = array($name, $firstname, $date, $sexe, $streetName, $pCode, $city, $email, $phone, $sizeBib, 0, NULL, NULL);
    $req = $db->prepare('INSERT INTO contestant(name, firstName, dBirth, sexe, streetName, pCode, city, email, telNum, sizeBib,isAdmin, login, pwd)
                       VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
   
 	$req->execute($data);      
   return 1;
}

function getContestants()
{
	$db = db_connection();
    
    $req = $db->prepare('SELECT *
                        FROM contestant
                        WHERE isAdmin = 0');
    
    $req->execute();
    $nameTourn = $req->fetchall(PDO::FETCH_OBJ);

    return $nameTourn;
	
}

function isAdmin($login, $pwdhash) //the password given has to be hashed before
{
	$db = db_connection();
   $req = $db->prepare('SELECT *
                        FROM contestant
                        WHERE isAdmin = 1');
	
	$req->execute();
	$res = $req->rowCount();
	return $res;
}

/*function getAdminNum()
{
	$db = db_connection();
    
    $req = $db->prepare('SELECT numCont
                        FROM contestant
                        WHERE isAdmin =:ad');

	$req -> bindParam(':ad', 1);
	$req -> execute();
	echo $req;
}*/

?>