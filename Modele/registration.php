<?php require_once('db_connect.php'); ?>

<?php

/*
 *creation of a new registration in db
 */
function setRegistration($numpermit, $paraut, $paid, $bib, $numcont, $numtourn, $numcat)
{
    print_r(array($numpermit, $paraut, $paid, $bib, $numcont, $numtourn, $numcat));
    $db = db_connection();

    $req = $db -> prepare('INSERT INTO registration(numPermit, parentAut, paid, bib, numCont, numTourn, numCat)
                        VALUES(:numpermit, :paraut, :paid, :bib, :numcont, :numtourn, :numcat)');

    try{
        $req->execute(array(
                    ':numpermit' => $numpermit,
                    ':paraut' => $paraut,
                    ':paid' => $paid,
                    ':bib' => $bib,
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

/*
 *returns name, fname, numreg, num bib and size of bib of contestants of a tournament
 */
function getRegBibAndSize($numtourn)
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT co.name, co.firstName, reg.numReg, reg.bib, co.sizeBib
                        FROM contestant AS co, registration AS reg
                        WHERE co.numCont = reg.numCont
							AND reg.numTourn =:numtourn');
    
    


    $req->execute(array(':numtourn' => $numtourn));
    $data = $req->fetchall(PDO::FETCH_OBJ);

    return $data;
    
}

/*
 *return numReg, name, firstName of contestants having paid the registration
 */
function regPaid($numtourn)
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT co.name, co.firstName, reg.numReg
                        FROM contestant AS co, registration AS reg
                        WHERE co.numCont = reg.numCont
							AND reg.numTourn =:numtourn
							AND reg.paid = 1');
    
    
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
    
    $req = $db->prepare('SELECT co.name, co.firstName, reg.numReg
                        FROM contestant AS co, registration AS reg
                        WHERE co.numCont = reg.numCont
							AND reg.numTourn =:numtourn
							AND reg.paid = 0
						');
    
    
    $req->execute(array(':numtourn' => $numtourn));
    $data = $req->fetchall(PDO::FETCH_OBJ);
    print_r($data);

    return $data;
    
}

/*
 *update bib of a contestant for a tournament
 */
function setBib($numtourn, $bib, $numcont)
{
    $db = db_connection();
	$req = $db -> prepare('UPDATE registration
                          SET bib=:bib
                          WHERE numCont =:numcont
							AND numTourn =:numtourn
						');
    try{
        
        $req->execute(array(
                    ':numtourn' => $numtourn,
                    ':bib' => $bib,
                    ':numcont' => $numcont
                    ));
    }
    catch(PDOException $e)
    {      
    
        echo 'PDOException: ' . $e->getMessage();
        exit();
    }
    

    return 1;
    
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
        echo '3';
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
    
    $req = $db->prepare('SELECT co.name, co.firstName, reg.numReg
                        FROM contestant AS co, registration AS reg, tournament AS tou
                        WHERE co.numCont = reg.numCont
							AND tou.numTourn = reg.numTourn
							AND reg.numTourn =:numtourn
							AND reg.parentAut = 0
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





?>