<?php

function db_connection()
{
    try{
        $db = new PDO('mysql:host=localhost;dbname=fort_boyard', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo'connect';
    }
    catch(PDOException $e)
    {
        echo 'Erreur de connexion à la base';
    }
    return $db;
}
?>