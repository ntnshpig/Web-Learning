<?php
    include 'DatabaseConnection.php';

    abstract class Model {
        public function __construct($table) {
            $this->setTabel($table);
            $this->setConnection();
        }

        protected function setTabel($table) {
            $this->table = $table;
        }

        public function setConnection() {
            $this->db_new = new DatabaseConnection('127.0.0.1', null, "ashpigunov", "securepass", "ucode_web");
        }

        abstract protected function find($id);
        abstract protected function save();
        abstract protected function delete();
    }
?>