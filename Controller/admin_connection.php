<?php require_once("../Modele/user.php"); ?>


<?php

if(isset($_POST["login"]) && $_POST["pwd"])
{
    $pwd = sha1($_POST["pwd"]);
    
    //case 1 : the user is the admin
    if(isAdmin(($_POST["pwd"]), $pwd) !=0)
    {
        $a = "est un admin";
        $a = sha1($a);
        
        setcookie("type", $a, time() + (86400  * 365),'/');
       header("Location: ../Vue/tournament_management.php");
       exit();
       
    }
    else
    {
        $msg = "Mauvais identifiants";
        header("Location: ../Vue/registration.php?msg=" .$msg);
    }    
}
else
{
    $msg = "Mauvais identifiants";
    header("Location: ../Vue/registration.php?msg=" .$msg);
}




?>