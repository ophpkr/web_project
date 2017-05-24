<?php require_once('db_connect.php'); ?>

<?php

function getAges()
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT numCat, miniAge, maxiAge
                        FROM category');
    
    $req->execute();
    $nameTourn = $req->fetchall(PDO::FETCH_OBJ);

    return $nameTourn;

}
?>