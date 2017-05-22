<?php require_once('../Modele/course.php'); ?>
<?php require_once('num_current_tourn.php'); ?>

<?php



function getNumsCourse()
{
    $numtourncour = getNumCourTourn();
    $course = getCourse($numtourncour);
    
    $list = array();
    for($i=0; $i< sizeof($course); $i++)
        {
            array_push($list, $course[$i] -> numCourse);
        }
    return $list;
}

function getNamesCourse()
{
    $numtourncour = getNumCourTourn();
    $course = getCourse($numtourncour);
    
    $list = array();
    for($i=0; $i< sizeof($course); $i++)
        {
            array_push($list, $course[$i] -> nameCourse);
        }
    return $list;
}

function getCoeffsCourse()
{
    $numtourncour = getNumCourTourn();
    $course = getCourse($numtourncour);
    
    $list = array();
    for($i=0; $i< sizeof($course); $i++)
        {
            array_push($list, $course[$i] -> coeff);
        }
    return $list;
}

$namecourse = getNamesCourse();
$coeffcourse = getCoeffsCourse();
$numcourse = getNumsCourse();

?>