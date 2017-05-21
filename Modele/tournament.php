<?php require_once('db_connect.php'); ?>

<?php

/*
 *give all tournaments by date desc
 */
function getTournamentsByDateDesc()
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT *
                        FROM tournament
                        ORDER BY dStart DESC');
    
    $req->execute();
    $nameTourn = $req->fetchall(PDO::FETCH_OBJ);

    return $nameTourn;
    
    
}

/*
 *give all num tournaments by date desc
 */
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

/*
 *creates a tournament
 */
function addTournament($name, $startDate, $endDate)
{
    $db = db_connection();
    
    $req = $db->prepare('INSERT INTO tournament(nameTourn, dStart, dEnd)
                        VALUES(:nameT, :dStart, :dEnd)');
    
    $req->execute(array(':nameT'=>$name, ':dStart'=>$startDate, ':dEnd'=>$endDate));
    
    return 1;
}


/*
 *update tournament with new infos
 */
function updateTournament($numTourninit, $newstartDate, $newendDate)
{
    $db = db_connection();
    
    $req = $db->prepare('UPDATE tournament(dStart, dEnd)
                        VALUES(:dStart, :dEnd)
                        WHERE numTourn=:numTourn');
    
    $req->execute(array(':dStartTourn'=>$newstartDate, ':dEnd'=>$newendDate, ':numTourn'=> $numTourninit));
    
    return 1;
}

/*
 *returns all infos about tournaments
 */
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

/*
 *Tournament in which contestants register
 */


function getCurrentTourn()
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT *
                        FROM tournament
                        WHERE DATEDIFF( CURRENT_DATE, dStart) <0');
    
    try
    {
        $req->execute();
    }
    catch(PDOException $e)
    {      
    
        echo 'PDOException: ' . $e->getMessage();
        exit();
    }
    $dataTourn= $req->fetchall(PDO::FETCH_OBJ);

    return $dataTourn;

}





?>