<?php
    function autoload($pClassName) { 
        include(__DIR__. '/' . $pClassName. '.php'); 
    }
    spl_autoload_register("autoload");
    
    $heroes = new Heroes();
    
    //Find and output 4 hero
    $heroes->find(4);
    echo $heroes->name . '  ' . $heroes->race . '   ' . $heroes->description . "\n";
    
    //Change and output 4 hero
    $heroes->name = "ashpigunov";
    $heroes->description = "i am dying";
    $heroes->race = "chel";
    $heroes->class_role = "dps";
    $heroes->save();
    echo $heroes->name . '  ' . $heroes->race . '   ' . $heroes->description . "\n";
    
    //Insert and output 11 hero
    $heroes->setId(11);
    $heroes->name = "lolka";
    $heroes->description = "mem";
    $heroes->race = "kek";
    $heroes->class_role = "dps";
    $heroes->save();
    echo $heroes->name . '  ' . $heroes->race . '   ' . $heroes->description . "\n";

    //Delete and output 11 hero
    $heroes->delete();
    echo $heroes->name . 'deleted last';
?>