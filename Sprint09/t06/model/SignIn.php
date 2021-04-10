<?php
    require_once "Model.php";

    class SignIn  extends Model {
        public $login;
        public $email;
        public $password;
        public $name;

        public function __construct() {
            parent::__construct("users");
        }

        public function sign_in($login, $password) {
            if ($this->db_new->getConnectionStatus() == true) {
                $newTable = $this->db_new->db_connection->query("SELECT * FROM " . $this->table . " WHERE login = '" . $login . "';");
                $arr = $newTable->fetch(PDO::FETCH_ASSOC);
                if(password_verify($password, $arr["password"])) {
                    $this->login = $login;
                    $this->password = $password;
                    $this->email = $arr["email_address"];
                    $this->name = $arr["full_name"];
                    $_SESSION['status'] = $arr["status_admin"];
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
?>