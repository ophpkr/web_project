<?php require_once('db_connect.php'); ?>

<?php

function getNameTournamentsByDateDesc()
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT nameTourn
                        FROM tournament
                        ORDER BY dStart DESC');
    
    $req->execute();
    $nameTourn = $req->fetchall(PDO::FETCH_OBJ);

    return $nameTourn;
    
    
}
function getNumTournamentsByDateDesc()
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT numTourn
                        FROM tournament
                        ORDER BY dStart DESC');
    
    $req->execute();
    $numTourn = $req->fetchall(PDO::FETCH_OBJ);

    return $numTourn;
    
    
}

function addTournament($name, $startDate, $endDate)
{
    $db = db_connection();
    
    $req = $db->prepare('INSERT INTO tournament(nameTourn, dStart, dEnd)
                        VALUES(:nameT, :dStart, :dEnd)');
    
    $req->execute(array(':nameT'=>$name, ':dStart'=>$startDate, ':dEnd'=>$endDate));
    
    return 1;
}

function update_tournament($numTourninit, $newname, $newstartDate, $newendDate)
{
    $db = db_connection();
    
    $req = $db->prepare('UPDATE tournament(nameTourn, dStart, dEnd)
                        VALUES(:nameTourn, :dStart, :dEnd)
                        WHERE numTourn=:numTourn');
    
    $req->execute(array(':nameTourn'=> $newname, ':dStartTourn'=>$newstartDate, ':dEnd'=>$newendDate, ':numTourn'=> $numTourninit));
    
    return 1;
}

function getTourn($numTourn)
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT *
                        FROM tournament
                        WHERE numTourn =:numTourn');
    
    $req -> bindParam(':numTourn', $numTourn);
    $req->execute();
    $dataTourn= $req->fetchall(PDO::FETCH_OBJ);

    return $dataTourn;
    
    
}

?>