<?php
    class DatabaseConnection {
        public function __construct($host, $port, $username, $password, $database) {
            $this->db_connection = new PDO("mysql:host=$host;dbname=$database", $username, $password, array(PDO::ATTR_ERRMODE=>true, PDO::ERRMODE_EXCEPTION=>true));
        }
        public function __destruct(){
            $this->db_connection = NULL;
        }
        public function getConnectionStatus() {
            return isset($this->db_connection) ? true : false;
        }
    }
?>