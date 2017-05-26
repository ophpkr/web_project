<?php require_once('db_connect.php'); ?>

<?php


function setRegistration($numpermit, $paraut, $numcont, $numtourn, $numcat)
{
    print_r(array($numpermit, $paraut, $numcont, $numtourn, $numcat));
    $db = db_connection();

    $req = $db -> prepare('INSERT INTO registration(numPermit, parentAut, paid, numCont, numTourn, numCat)
                        VALUES(:numpermit, :paraut, 0, :numcont, :numtourn, :numcat)');

    try{
        $req->execute(array(
                    ':numpermit' => $numpermit,
                    ':paraut' => $paraut,
                    ':numcont' => $numcont,
                    ':numtourn' => $numtourn,
                    ':numcat' => $numcat));
    }
    catch(PDOException $e)
    {
        echo 'PDOException: ' . $e->getMessage();
        exit();
        }
    
    return 1;
}




function regPaid($numtourn)
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT co.name, co.firstName, reg.numReg
                        FROM contestant AS co, registration AS reg
                        WHERE co.numCont = reg.numCont
							AND reg.numTourn =:numtourn
							AND reg.paid = 1
						ORDER BY co.name ASC
						');
    
    
    $req->execute(array(':numtourn' => $numtourn));
    $data = $req->fetchall(PDO::FETCH_OBJ);

    return $data;
    
}

/*
 *return numReg, name, firstName of contestants having not paid the registration
 */
function regNotPaid($numtourn)
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT co.numCont, co.name, co.firstName, reg.numReg, co.sexe, co.streetName, co.pCode, co.city, co.email, co.telNum
                        FROM contestant AS co, registration AS reg
                        WHERE co.numCont = reg.numCont
							AND reg.numTourn =:numtourn
							AND reg.paid = 0
						ORDER BY co.name ASC
						');
    
    
    $req->execute(array(':numtourn' => $numtourn));
    $data = $req->fetchall(PDO::FETCH_OBJ);

    return $data;
    
}

/*
 *update bib of a contestant for a tournament
 */
function setBib($bib, $numreg)
{
    $db = db_connection();
	$req = $db -> prepare('UPDATE registration
                          SET bib=:bib
                          WHERE numReg =:numreg
						');
    try{
        
        $req->execute(array(
                    ':numreg' => $numreg,
                    ':bib' => $bib
                    ));
    }
    catch(PDOException $e)
    {      
    
        echo 'PDOException: ' . $e->getMessage();
        exit();
    }
    

    return 1;
    
}

function getMaxBib($numcourtourn)
{
	$db = db_connection();
    
    $req = $db->prepare('SELECT MAX(bib) AS bibmax
                        FROM registration
                        WHERE numTourn =:numtourn');
    
    
    $req->execute(array(':numtourn' => $numcourtourn));
    $data = $req->fetchall(PDO::FETCH_OBJ);

    return $data;
}


/*
 *update paid at 1 i.e. the contestant has paid his registration
 */
function setPaid($numreg)
{
    $db = db_connection();
	$req = $db -> prepare('UPDATE registration
                          SET paid = 1
                          WHERE numReg =:numreg');
    try{
        
        $req->execute(array(':numreg' => $numreg));
    }
    catch(PDOException $e)
    {      
    
        echo 'PDOException: ' . $e->getMessage();
        exit();
    }
    

    return 1;
    
}

/*
 *returns minor having not given their parental authorisation
 */
function notAP($numtourn)
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT co.numCont, co.name, co.firstName, reg.numReg, co.sexe, co.streetName, co.pCode, co.city, co.email, co.telNum
                        FROM contestant AS co, registration AS reg, tournament AS tou
                        WHERE co.numCont = reg.numCont
							AND tou.numTourn = reg.numTourn
							AND reg.numTourn =:numtourn
							AND reg.parentAut = 0
						ORDER BY co.name ASC
						');
    
    
    $req->execute(array(':numtourn' => $numtourn));
    $data = $req->fetchall(PDO::FETCH_OBJ);

    return $data;
    
}

/*
 *returns minor having given their parental authorisation
 */

function hasAP($numtourn)
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT co.name, co.firstName, reg.numReg
                        FROM contestant AS co, registration AS reg, tournament AS tou
                        WHERE co.numCont = reg.numCont
							AND tou.numTourn = reg.numTourn
							AND reg.numTourn =:numtourn
							AND reg.parentAut = 1
						');
    
    
    $req->execute(array(':numtourn' => $numtourn));
    $data = $req->fetchall(PDO::FETCH_OBJ);

    return $data;
    
}

/*
 * update parentAut at 1 i.e. parental authorisation has been given 
 */

function setAutPar($numreg)
{
    $db = db_connection();
	$req = $db -> prepare('UPDATE registration
                          SET parentAut = 1
                          WHERE numReg =:numreg');
    try{
        
        $req->execute(array(':numreg' => $numreg));
    }
    catch(PDOException $e)
    {      
    
        echo 'PDOException: ' . $e->getMessage();
        exit();
    }
    

    return 1;
    
}

/*
 *returns registrations ended
 */

function getRegistrationOk($numtourn)
{
	$db = db_connection();
    
    $req = $db->prepare('SELECT co.numCont, co.name, co.firstName, reg.numReg, co.sexe, co.streetName, co.pCode, co.city, co.email, co.telNum
                        FROM contestant AS co, registration AS reg
                        WHERE co.numCont = reg.numCont
							AND reg.numTourn = :numtourn
							AND reg.paid = 1
							AND (reg.parentAut != 0 OR reg.parentaut IS NULL)
						');
    
    $req->execute(array(':numtourn' => $numtourn));
    $contestantsok = $req->fetchall(PDO::FETCH_OBJ);

    return $contestantsok;
	
}

function bibExists($bib)
{
	$db = db_connection();
    
    $req = $db->prepare('SELECT numReg
                        FROM registration
                        WHERE bib =:bib');
	    
	$req->execute(array(':bib' => $bib));
	$res = $req->rowCount();
	return $res;
}

function deleteRegistration($numReg)
{
	$db = db_connection();
    
    $req = $db->prepare('DELETE FROM registration
                        WHERE numReg =:numreg');
    
    $req->execute(array(':numreg' => $numReg));
    
    return 1;
}

function numberReg($numtourn)
{
	$db = db_connection();
    
    $req = $db->prepare('SELECT numReg
                        FROM registration
                        WHERE numTourn =:numtourn');
	    
	$req->execute(array(':numtourn' => $numtourn));
	$res = $req->rowCount();
	return $res;
}

function getInfosReg($numreg)
{
	$db = db_connection();
    
    $req = $db->prepare('SELECT reg.numReg, co.name, co.firstName, co.sexe, reg.bib
                        FROM contestant AS co, registration AS reg
                        WHERE co.numCont = reg.numCont
									AND reg.numReg = :numreg
								');
    
    $req->execute(array(':numreg' => $numreg));
    $infos = $req->fetchall(PDO::FETCH_OBJ);

    return $infos;
	
}



?>