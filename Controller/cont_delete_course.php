<?php require_once('../Modele/course.php'); ?>

<?php

deleteCourse($_GET['numcourse']);
header('Location: ../Vue/course_management.php');

?>