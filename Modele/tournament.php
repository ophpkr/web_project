<?php require_once('db_connect.php'); ?>

<?php


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
    
    $req = $db->prepare('INSERT INTO tournament(nameTourn, dStart, dEnd, regClosed)
                        VALUES(:nameT, :dStart, :dEnd, 0)');
    
    $req->execute(array(
                    ':nameT'=>$name,
                    ':dStart'=>$startDate,
                    ':dEnd'=>$endDate
                    ));
    
    return 1;
}



function updateTourn($newstartDate, $newendDate, $numcourtourn)
{
    $db = db_connection();
    
    $req = $db->prepare('UPDATE tournament
                        SET dStart = :dStart, dEnd =:dEnd
                        WHERE numTourn =:numcourtourn');
    
    $req->execute(array(
                    ':dStart' => $newstartDate,
                    ':dEnd' => $newendDate,
                    ':numcourtourn' => $numcourtourn
                    ));
    
    return 1;
}


function getTourn($numTourn)
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT 
                        FROM tournament
                        WHERE numTourn =:numTourn');
    
    $req -> bindParam(':numTourn', $numTourn);
    $req->execute();
    $dataTourn= $req->fetchall(PDO::FETCH_OBJ);

    return $dataTourn;
    
    
}




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


function deleteTourn($numtourn)
{
    $db = db_connection();
    
    $req = $db->prepare('DELETE FROM tournament
                        WHERE numTourn =:numtourn');
    
    $req->execute(array(':numtourn' => $numtourn));
    
    return 1;
}

function existsCurrentTourn()
{
$db = db_connection();
    $req = $db->prepare('SELECT numTourn
                        FROM tournament
                        WHERE DATEDIFF( CURRENT_DATE, dStart) <0 AND regClosed = 0');
	    
	$req->execute();
	$res = $req->rowCount();
	return $res;
}
?>