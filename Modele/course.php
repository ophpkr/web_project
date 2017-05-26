<?php require_once('db_connect.php'); ?>

<?php

function existNameCourse($namecourse, $numtourncour)
{
    $db = db_connection();
    $req = $db->prepare('SELECT numCourse
                        FROM course
                        WHERE numTourn =:numtourn AND nameCourse =:namecourse');
	    
	$req->execute(array(
                    ':namecourse' => $namecourse,
                    ':numtourn' => $numtourncour
                    ));
	$res = $req->rowCount();
	return $res;
}

function addCourse($namecourse, $coeff, $numtourncour)
{
    $db = db_connection();
    
    $req = $db->prepare('INSERT INTO course(nameCourse, coeff, numTourn)
                        VALUES(:namecourse, :coeff, :numtourn)');
    
    $req->execute(array(
                    ':namecourse'=>$namecourse,
                    ':coeff'=>$coeff,
                    ':numtourn'=>$numtourncour
                    ));
    
    return 1;
}


function getCourse($numtourncour)
{
    $db = db_connection();
    $req = $db->prepare('SELECT numCourse, nameCourse, coeff
                        FROM course
                        WHERE numTourn =:numtourn
						ORDER BY numCourse ASC');
	    
	$req->execute(array(':numtourn' => $numtourncour));
    $res = $req->fetchall(PDO::FETCH_OBJ);
	return $res;
}

function getCoeff($numcourse)
{
    $db = db_connection();
    $req = $db->prepare('SELECT coeff
                        FROM course
                        WHERE numCourse =:numcourse');
	    
	$req->execute(array(':numcourse' => $numcourse));
    $res = $req->fetchall(PDO::FETCH_OBJ);
	return $res;
}

function deleteCourse($numcourse)
{
    $db = db_connection();
    
    $req = $db->prepare('DELETE FROM course
                        WHERE numCourse =:numcourse');
    
    $req->execute(array(':numcourse' => $numcourse));
    
    return 1;
}

function getNumCourse($numtourn)
{
	$db = db_connection();
    $req = $db->prepare('SELECT numCourse
                        FROM course
                        WHERE numTourn =:numtourn');
	    
	$req->execute(array(':numtourn' => $numtourn));
    $res = $req->fetchall(PDO::FETCH_OBJ);
	return $res;
	
}






?>