<?php  
    include "LLItem.php";

    class MyIterator implements Iterator {

        private $var = array();

        public function __construct($array) {
            if (is_array($array)) {
                $this->var = $array;
            }
        }
        public function rewind() {
            reset($this->var);
        }
        public function current() {
            $var = current($this->var);
            return $var;
        }
        public function key() {
            $var = key($this->var);
            return $var;
        }
        public function next() {
            $var = next($this->var);
            return $var;
        }
        public function valid() {
            $key = key($this->var);
            $var = ($key !== NULL && $key !== FALSE);
            return $var;
        }

    }

    class LList implements IteratorAggregate {
        public $head;

        public function __construct() {
            $this->head = null;
        }

        public function getFirst() {
            return $this->head->data;
        }

        public function getLast() {
            $tmp = $this->head;
            while ($tmp->next != null) {
                $tmp = $tmp->next;
            }
            return $tmp->data;
        }

        public function add($value) {
            $new_node = new LLItem();
            $new_node->data = $value; 
            $new_node->next = null; 

            if($this->head == null) {
                $this->head = $new_node;
            } else {
                $tmp = $this->head;
                while ($tmp->next != null) {
                    $tmp = $tmp->next;
                }
                $tmp->next = $new_node;
            }
        }

        public function addArr($array) {
            foreach($array as $el){
                $this->add($el);
            }
        }

        public function remove($value) {
            $current = $this->head;
            $previous = $this->head;
    
            while($current->data != $value) {
                if($current->next == null) {
                    return null;
                } else {
                    $previous = $current;
                    $current = $current->next;
                }
            }
            if($current == $previous) {
                $this->head = $current->next;
            }
            $previous->next = $current->next;
        } 

        public function removeAll($value) {
            $tmp = $this->head;

            while($tmp != null) {
                if($tmp->data == $value) {
                    $this->remove($value);
                }
                $tmp = $tmp->next;
            }
        }

        public function contains($value) {
            $tmp = $this->head;

            while($tmp != null) {
                if($tmp->data == $value)
                    return TRUE;
                $tmp = $tmp->next;
            }
            return FALSE;
        }

        public function clear() {
            $this->head = null;
        }

        public function count() {
            $tmp = $this->head;
            $count = 0;
            while($tmp != null) {
                $tmp = $tmp->next;
                $count++;
            }
            return $count;
        }

        public function toString() {
            $tmp = $this->head;
            $str = "";
            if($tmp != null){
                $str =  $str . $tmp->data;
                $tmp = $tmp->next;
            }
            while($tmp != null) {
                $str = $str . ", " . $tmp->data;
                $tmp = $tmp->next;
            }
            return $str;
        }

        public function getIterator() {
            $tmp = $this->head;

            $tmp_arr = [];

            for($i = 0; $tmp != null; $i++) {
                $tmp_arr[$i] = $tmp->data;
                $tmp = $tmp->next;
            }

            $it_name = new MyIterator($tmp_arr);
            return $it_name;
        }
    }


    // $list = new LList();
    // $list->addArr([100, 1, 2, 3, 100, 4, 5, 100]);
    // $list->removeAll(100);
    // $list->add(10);
    // echo $list->contains(10) . "\n"; // 1
    // echo $list->toString() . "\n"; // 1, 2, 3, 4, 5, 10
    // $sum = 0;
    // $iter = $list->getIterator();
    // foreach ($iter as $v)
    // $sum += $v;
    // echo "$sum\n"; // 25
    // $list->clear();
    // echo $list->toString() . "\n";

?>