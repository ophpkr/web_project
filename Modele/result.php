<?php require_once('../Modele/db_connect.php'); ?>


<?php

function setmake($numreg, $numcourse, $score)
{

    $db = db_connection();

    $req = $db -> prepare('INSERT INTO make(score, numReg, numCourse)
                          VALUES(:score, :numreg, :numcourse)');

    try{
        $req->execute(array(
                    ':score' => $score,
                    ':numreg' => $numreg,
                    ':numcourse' => $numcourse
                    ));
    }
    catch(PDOException $e)
    {
        echo 'PDOException: ' . $e->getMessage();
        exit();
        }
    
    return 1;
}

function numReg($bib)
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT numReg
                        FROM registration
                        WHERE bib =:bib');
    
    $req -> bindParam(':bib', $bib);
    $req->execute();
    $dataTourn= $req->fetchall(PDO::FETCH_OBJ);

    return $dataTourn;
}

function getScoreMax($numcourse)
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT MAX(score) AS scoremax
                        FROM make
                        WHERE numCourse =:numcourse');
    
    
    $req->execute(array(':numcourse' => $numcourse));
    $data = $req->fetchall(PDO::FETCH_OBJ);

    return $data;
}

function bibRegistered($numreg, $numcourse)
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT score 
                        FROM make
                        WHERE numCourse =:numcourse AND numReg =:numreg');
	    
	$req->execute(array(
                    ':numcourse' => $numcourse,
                    ':numreg' => $numreg
                    ));
	$res = $req->rowCount();
	return $res;
    
}

function getInfosScore($numReg, $numTourn)
{
	$db = db_connection();
    
    $req = $db->prepare('SELECT reg.numReg, reg.bib, co.name, co.firstName, co.sexe, make.score, cat.nameCat
                        FROM make, registration AS reg, contestant AS co, course, category AS cat
                        WHERE reg.numCont = co.numCont
							AND reg.numReg = make.numReg
							AND make.numCourse = course.numCourse
							AND reg.numCat = cat.numCat
							AND reg.numTourn = course.numTourn
							AND make.numReg = :numreg
							AND reg.numTourn = :numtourn'
						);
    
    
    $req->execute(array(
						':numtourn' => $numTourn,
						':numreg' => $numReg
						));
	
    $data = $req->fetchall(PDO::FETCH_OBJ);

    return $data;
}

?>