<?php 
    class Overload {
        private $data = array();

        public function __set(string $key, string $value ) {
            $this->data[$key] = $value;
        }
        public function __isset (string $key ) : bool {
            if(!array_key_exists($key, $this->data)){
                return $this->data[$key] = "NO SET";
            }
            return isset($this->data[$key]);
        }
        public function __unset (string $key ){
            unset($this->data[$key]);
            $this->data[$key] = null;
        }
        public function __get (string $key ) {
            if (array_key_exists($key, $this->data)) {
                return $this->data[$key];
            } else {
                return "NO DATA";
            }
        }
    }

    /*$overload = new Overload();
    $overload->mark_LXXXV = "INACTIVE";
    echo $overload->mark_LXXXV;
    echo "\n" . $overload->mark_LXXXVI;
    
    if (isset($overload->mark_LXXXVI))
        echo "\n" . $overload->mark_LXXXVI;
    unset($overload->mark_IV);
    if ($overload->mark_IV == NULL)
        echo "\nNULL\n";*/
?>