<?php require_once('../Modele/course.php'); ?>

<?php

$numcourse = $_GET['numcourse'];

setClosed($numcourse);
header('Location : ../Vue/course_management.php');



?>