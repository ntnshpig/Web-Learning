<?php
    require_once __DIR__.'/connection/DatabaseConnection.php';

    abstract class Model {
        public function __construct($table) {
            $this->setTabel($table);
            $this->setConnection();
        }

        protected function setTabel($table) {
            $this->table = $table;
        }

        public function setConnection() {
            $this->db_new = new DatabaseConnection('127.0.0.1', null, "ashpigunov", "securepass", "sword");
        }
    }
?>