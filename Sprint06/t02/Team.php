<?php 
    class Avenger {
        public $name;
        public $alias;
        public $gender;
        public $age;
        public $hp;
        public $power = array();

        public function __construct($name, $alias, $gender, $age, $power, $hp) {
            $this->name = $name;
            $this->alias = $alias;
            $this->gender = $gender;
            $this->age = $age;
            $this->power = $power;
            $this->hp = $hp;

        }

        public function __toString() {
            return "name: " . $this->name . "\ngender: " . $this->gender . "\nage: " . $this->age . "\n";
        }

        public function __invoke(){
            echo strtoupper($this->alias) . "\n";
            foreach ($this->power as $val){
                echo $val . "\n";
            }
            echo "\n";
        }
    }

    class Team {
        public $id;
        public $avengers = array();

        public function __construct($id, $avengers) {
            $this->id = $id;
            $this->avengers = $avengers;
        }

        public function battle($damage) {
            foreach($this->avengers as $hero){
                $hero->hp = $hero->hp - $damage;
            }
            for($i = 0; $i <= count($this->avengers); $i++){
                if($this->avengers[$i]->hp <= 0) {
                    unset($this->avengers[$i]);
                }
            }
            if($this->avengers[0]->hp <= 0) {
                array_shift($this->avengers);
            }
        }

        public function calculate_losses($cloned_team) {
            $tmp = count($cloned_team->avengers) - count($this->avengers);

            if($tmp == 0) {
                echo "We haven't lost anyone in this battle!\n";
            } else {
                echo "In this battle we lost $tmp Avenger(s).\n";
            }
        }
    }
    
    // $arr = array();
    // $arr[0] = new Avenger("Tony Stark", "Iron Man", "man", 38, ["intelligence", "durability", "magnetism"], 120);
    // $arr[1] = new Avenger("Natasha Romanoff", "Black Widow", "woman", 35, ["agility", "martial arts"], 75);
    // $arr[2] = new Avenger("Carol Danvers", "Captain Marvel", "woman", 27, ["durability", "flight", "interstellar travel"], 95);
    // $team = new Team(1, $arr);
    // echo "Battle 1\n";
    // $cloned_team = clone $team;
    // $damage = 25;
    // $team->battle($damage);
    // $team->calculate_losses($cloned_team);
    // echo "\nBattle 2\n";
    // $cloned_team = clone $team;
    // $damage = 80;
    // $team->battle($damage);
    // $team->calculate_losses($cloned_team);
?>