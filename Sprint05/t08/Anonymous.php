<?php 
    function get_anonymous($name, $alias, $affiliation) {
        return new class($name, $alias, $affiliation) {
            private $name, $alias, $affiliation;

            public function __construct($name, $alias, $affiliation)
            {
                $this->name = $name;
                $this->alias = $alias;
                $this->affiliation = $affiliation;
            }
    
            public function getName() : string{
                return $this->name;
            }
            public function getAlias() : string {
                return $this->alias;
            }
            public function getAffiliation() : string {
                return $this->affiliation;
            }
            public function setName($name){
                $this->name = $name;
            }
            public function setAlias($alias) {
                $this->alias = $alias;
            }
            public function setAffiliation($affiliation) {
                $this->affiliation = $affiliation;
            }
        };
    }   

    /*$mandarin = get_anonymous("Unknown", "Mandarin", "Ten Rings");
    print(implode("\n", array("name" => $mandarin->getName(), "alias" => $mandarin->getAlias(), "affiliation" => $mandarin->getAffiliation())));*/
?>