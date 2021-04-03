<?php 
    namespace Space\Quantum;
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
?>