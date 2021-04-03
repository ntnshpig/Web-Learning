<?php

    trait Update {
        private $data = array( "2 x Repulsors", "M134 7.62mm Minigun", "2 x FN F2000 Tacticals$", "Sidewinder \"Ex-Wife\" Self-Guided Missile", "M24 Shotgun", "Milkor MGL 40mm Grenade Launcher",);

        public function makeBoom() {
            return $this->data;
        }
    }

    /*spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
    });
    $mark_II = new MarkII();
    echo $mark_II->makeBoom() ."\n";
    class WarMachine extends MarkII {
    use Update;
    }
    $wm = new WarMachine();
    print_r($wm->makeBoom());*/

?>