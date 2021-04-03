<?php 
    function checkDivision($a = 1, $b=60) {
        for($i = $a; $i < $b+1; $i++){
            $str = "The number " . $i;
            if($i % 2 == 0) {
                $str = $str . " is divisible by 2";
                if($i % 3 == 0) 
                    $str = $str . ", is divisible by 3";
                if($i % 10 == 0) 
                    $str = $str . ", is divisible by 10";
            } elseif($i % 3 == 0) {
                $str = $str . " is divisible by 3";
                if($i % 10 == 0) 
                    $str = $str . ", is divisible by 10";
            } elseif($i % 10 == 0) {
                $str = $str . " is divisible by 10";
            } else {
                $str = $str . ' -';
            }
            $str = $str . "\n";
            echo($str);
        }
    }

    /*echo "*** Range is 3 - 7 checkDivision(3,7) ***\n";
    checkDivision(3,7);
    echo "\n*** Range is 58 - ... checkDivision(58) ***\n";
    checkDivision(58);
    echo "\n*** Range is ... - ... checkDivision() ***\n";
    checkDivision();*/
?>