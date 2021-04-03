<?php

    class Ingestion {
        public $id, $day_of_diet;
        public $products = array();
        public $meal_type = array("breakfast", "lunch", "dinner");
        
        public function __construct($meal_type, $day_of_diet) {
            $this->day_of_diet = $day_of_diet;
            if(!in_array($meal_type, $this->meal_type)) {
                echo "Incorrect meal type!\n";
                exit(0);
            }
        }

        public function get_from_fridge($product) {
            if($this->products[$product]->getKcal() > 200){
                throw new EatException();
            } 
        }
        public function setProduct($product) {
            $this->products[$product->name] = $product;
        }
        public function getProducts() {
            return $this->products;
        }
    }
    
?>