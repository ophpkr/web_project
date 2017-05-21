<?php

function db_connection()
{
    try{
        $db = new PDO('mysql:host=localhost;dbname=web_project', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo 'Erreur de connexion à la base';
    }
    return $db;
}
?>