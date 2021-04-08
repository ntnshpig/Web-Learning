<?php
    function autoload($pClassName) { 
        include(__DIR__. '\/models/' . $pClassName. '.php'); 
    }
    spl_autoload_register("autoload");
?>