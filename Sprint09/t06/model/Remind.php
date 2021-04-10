<?php
    require_once "Model.php";

    class Remind extends Model {
        public function __construct() {
            parent::__construct("users");
        }
        public function remind_pass($login) {
            $newTable = $this->db_new->db_connection->query("SELECT password, email_address, full_name FROM " . $this->table . " WHERE login = '" . $login . "';");
            $array = $newTable->fetch(PDO::FETCH_ASSOC);
            if($array && $array['password'] && $array['email_address']) {
                mail($array['email_address'], NULL, "Dear " . $array['full_name'] . ".\nThis is your password reminder.\nYour password is: " . $array['password'] . "\nHave a nice day!");
                return true;
            }
            return false;
        }
    }
?>