<?php require_once('./num_current_tourn.php'); ?>
<?php require_once('../Modele/course.php'); ?>

<?php

if(isset($_POST['namecourse']) AND isset($_POST['coeff']))
{
    if(!preg_match('/^[0-9a-zA-Z-\s]+$/', $_POST['namecourse']))
        {
            //$msg : the message returned to the user when the registration has something wrong
            $msg = "Nom de manche incorrect";
            header("Location: ../Vue/course_management.php?msg=" .$msg);
            exit();
        }
        
    if($_POST['coeff'] < 1 || $_POST['coeff'] >10)
    {
        $msg = "Coefficient incorrect";
        header("Location: ../Vue/course_management.php?msg=" .$msg);
        exit();
    }
    
    $numtourncour = getNumCourTourn();
    
    if(existNameCourse($_POST['namecourse'], $numtourncour))
    {
        $msg = "Ce nom de manche est déjà utilisé pour la compétition";
        header("Location: ../Vue/course_management.php?msg=" .$msg);
        exit();
    }
    else
    {
        addCourse($_POST['namecourse'], $_POST['coeff'], $numtourncour);
        header("Location: ../Vue/course_management.php?msg=" .$msg);
        exit();
    }
}
else
{
    $msg = "Vous n'avez pas rempli tous les champs";
    header("Location: ../Vue/course_management.php?msg=" .$msg);
    exit();
}
?>
    

