<?php require_once('db_connect.php'); ?>

<?php

function getRound()
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT *
                        FROM course');
    
    $req->execute();
    $dataTourn = $req->fetch();
    
    return 1;
}

function addRound($name, $coeff, $tournCorr)
{
    $db = db_connection();
    
    $req = $db->prepare('INSERT INTO course(nameRound, coeff, numTourn)
                        VALUES(:nameR,:coeff,:numtourn)');
    
    $req->execute(array(':nameR'=>$name, ':coeff'=>$coeff, ':numTourn'=>$tournCorr));
    
    return 1;
}


?>