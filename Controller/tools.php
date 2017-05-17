<?php
function convertToDate($day, $month, $year)
{
    if(strlen($day) == 1)
    {
        $day = '0' . $day;
    }
    if(strlen($month) == 1)
    {
        $month = '0' . $month;
    }
    
    $date = $year . '-' . $month . '-' . $day;
    return $date;
}

?>