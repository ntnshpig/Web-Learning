<?php
    class Router {
        public $params = array();
        function __construct() {
            foreach($_GET as $key => $val) {
                $this->params[$key] = $val;
            }
        }

        public function getParams() {
            $str = NULL;
            foreach($this->params as $key => $val) {
                $str .= "'" . $key . "': '" . $val . "' ";
            }
            $str = "{" . trim($str) . "}";
            echo $str;
        }
    }
?>