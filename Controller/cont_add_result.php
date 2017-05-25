<?php require_once('../Modele/result.php'); ?>
<?php require_once('../Modele/registration.php'); ?>
<?php require_once('../Modele/course.php'); ?>

<?php


if(isset($_POST['bib']) AND isset($_POST['numcourse']))
{
    
    if(is_numeric($_POST['bib']))
    {
        $bib = intval($_POST['bib']);
        
        if(bibExists($bib) == 0)
        {
            $msg = "Ce numéro de dossard n'existe pas";
            header('Location:../Vue/course_management.php');
            exit();
        }
        
        $numreg = numReg($bib)[0] -> numReg;
        
        if(bibRegistered($numreg, $_POST['numcourse']) != 0)
        {
            $msg = "Ce numéro de dossard a déjà été enregistré";
            header('Location : ../Vue/course_management.php');
            exit();
        }
        
        
        
        $scoremax = getScoreMax($_POST['numcourse']);
            
        if($scoremax[0] -> scoremax == NULL)
        {
            $scoremax = 0;
        }
        else
        {
            $scoremax = $scoremax[0] -> scoremax;
        }
        
        $coeff = getCoeff($_POST['numcourse'])[0] -> coeff;
        
        $scoreobtained = ($scoremax + 1)*$coeff;

        setmake($numreg, $_POST['numcourse'], $scoreobtained);
        header('Location : ../Vue/course_management.php');
        exit();
    }
    else
    {
        $msg = "Numéro de dossard incorrect";
        header('Location : ../Vue/course_management.php');
        exit();
        
    }
}
else
{
    $msg = "Aucun dossard entré";
    header('Location : ../Vue/course_management.php');
    exit(); 
}

    
    

?>