<?php require_once('db_connect.php'); ?>

<?php

function getTournament()
{
    $db = db_connection();
    
    $req = $db->prepare('SELECT * FROM tournament');
    
    $req->execute();
    $dataTourn = $req->fetch();  //2 dimensions array
    
    return 1;
}


?>