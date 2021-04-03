<?php 
    class Tower extends Building {
        private $elevator = FALSE;
        private $arc_capacity = 0;
        private $height = 0;

        public function hasElevator() : bool {
            return $this->elevator;
        }
        public function setElevator($el) {
            $this->elevator = $el;
        }
        public function getArcCapacity() : int {
            return $this->arc_capacity;
        }
        public function setArcCapacity($cap) {
            $this->arc_capacity = $cap;
        }
        public function getHeight() : float{
            return $this->height;
        }
        public function setHeight($height) {
            $this->height = $height;
        }
        public function getFloorHeight(): float {
            return $this->height/$this->floors;
        }
        public function toString() : string {
            $props = [
                "Elevator : " . (($this->elevator) ? "+" : "-"),
                "Arc reactor capacity : " . $this->arc_capacity,
                "Height : " . $this->height,
                "Floor height : " . $this->getFloorHeight(),
            ];

            $str = parent::toString();;
            foreach ($props as $p)
                $str = $str . $p . "\n";
            return $str;
        }
    }
?>