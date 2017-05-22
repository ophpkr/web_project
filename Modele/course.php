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

?>