<?php 
    class HardWorker {
        private $name, $age, $salary;

        public function setName($name) {
            $this->name = $name;
        }
        public function setAge($age) {
            if($age >= 1 && $age <= 100){
                $this->age = $age;
                return TRUE;
            } else {
                return FALSE;
            }
        }
        public function setSalary($salary) {
            if($salary >= 100 && $salary <= 10000){
                $this->salary = $salary;
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function getName() {
            return $this->name;
        }
        public function getAge() {
            return $this->age;
        }
        public function getSalary() {
            return $this->salary;
        }

        public function toArray() {
            $res = array();
            $res["name"] = $this->name;
            $res["age"] = $this->age;
            $res["salary"] = $this->salary;
            return $res;
        }
    }

    /*$Bruce = new HardWorker();
    $Bruce->setName("Bruce");
    echo $Bruce->getName() . "\n";
    $Bruce->setAge(50);
    $Bruce->setSalary(1500);
    print_r ($Bruce->toArray());
    $Bruce->setName("Linda");
    $Bruce->setAge(140);
    print_r ($Bruce->toArray());*/
?>