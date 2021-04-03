<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Quantum space</title>
</head>

<body>
    <p><?php
     use \DateInterval;

     function calculate_time() {
         $real_time = date_create("now")->diff(date_create('1939-01-01'));
         $time = date_diff(((date_create("1939-01-01"))->add(new DateInterval('PT'.((int)($real_time->format("%a")/6*24*3600)).'S'))), (date_create("1939-01-01"))); 
         
         return [ 
             $time->format("%Y"), 
             $time->format("%m"), 
             $time->format("%d") 
         ]; 
     }
    $time= calculate_time();
    echo"In quantum space you were absent for ". $time[0] . " years, ".$time[1] . " months, ". $time[2] . " days";?></p>
</body>
</html>