<?php require_once('db_connect.php'); ?>

<?php



function addContestant($name, $firstname, $date, $sexe, $streetName, $pCode, $city, $email, $phone)
{
   $db = db_connection();    //creation of an array containing data about the contestant
   $data = array($name, $firstname, $date, $sexe, $streetName, $pCode, $city, $email, $phone, 0, NULL, NULL);
    $req = $db->prepare('INSERT INTO contestant(name, firstName, dBirth, sexe, streetName, pCode, city, email, telNum, isAdmin, login, pwd)
                       VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
   
 	$req->execute($data);      
   return 1;
}

function mailExists($mail)
{
	$db = db_connection();
   $req = $db->prepare('SELECT numCont
                        FROM contestant
                        WHERE email = :email');
	
	$req->execute(array(':email' => $mail));
	$res = $req->rowCount();
	return $res;
}

function getInfos($numcont)
{
	$db = db_connection();
    
    $req = $db->prepare('SELECT co.name, co.firstName, co.dBirth, co.sexe, co.streetName, co.pCode, co.city, co.email, co.telNum
                        FROM contestant
                        WHERE co.numCont = :numcont
								');
    
    $req->execute(array(':numcont' => $numcont));
    $contestantsok = $req->fetchall(PDO::FETCH_OBJ);

    return $contestantsok;
	
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


function deleteContestant($numcont)
{
    $db = db_connection();
    
    $req = $db->prepare('DELETE FROM contestant
                        WHERE numcont =:numcont');
    
    $req->execute(array(':numcont' => $numcont));
    
    return 1;
}

function getNumCont($email)
{
	$db = db_connection();
   $req = $db->prepare('SELECT numCont
                        FROM contestant
                        WHERE email = :email');
	
	$req->execute(array(':email' => $email));
	$numcont = $req -> fetchall(PDO::FETCH_OBJ);
	$numcont = $numcont[0] -> numCont;
	
	return $numcont;
}

function getStreet($email)
{
	$db = db_connection();
   $req = $db->prepare('SELECT streetName
                        FROM contestant
                        WHERE email = :email');
	
	$req->execute(array(':email' => $email));
	$numcont = $req -> fetchall(PDO::FETCH_OBJ);
	$numcont = $numcont[0] -> streetName;
	
	return $numcont;
}

function updateContInfos($email, $street, $pcode, $city, $numtel)
{
	$db = db_connection();
    
    $req = $db->prepare('UPDATE contestant
                        SET streetName = :street, pCode = :pcode, city = :city, telNum = :numtel
                        WHERE email =:email');
    
    $req->execute(array(
						  'email' => $email,
                    ':street' => $street,
                    ':pcode' => $pcode,
                    ':city' => $city,
						  ':numtel' => $numtel
                    ));
    
    return 1;
	
	
}

?>