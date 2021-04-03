<?php

    class EatException extends Error {
        public function __construct() {
            $this->message = 'No more junk food, dumpling';
        }
        
        public function __toString() {
            return $this->message;
        }
    }

?>