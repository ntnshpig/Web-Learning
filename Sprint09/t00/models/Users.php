
<?php
    include "Model.php";

    class Users extends Model {
        public $id = null;
        public $login;
        public $email;
        public $password;
        public $name;

        public function __construct() {
            parent::__construct("users");
        }
        function save($login, $email, $password, $repeat, $name) {
            if ($this->db_new->getConnectionStatus() == true) {
                $newTable = $this->db_new->db_connection->query("SELECT id, login FROM " . $this->table . " WHERE login = '" . $login . "' or " . " email_address = '" . $email . "';");
                $arr = $newTable->fetch(PDO::FETCH_ASSOC);
                if($arr || ($this->password != $this->repeat)) {
                    return false;
                } else {
                    $sql = "INSERT INTO users (login, email, password, name) VALUES (:login, :email, :password, :name)";
                    $sth = $this->db_new->db_connection->prepare($sql);
                    $pass = crypt($password, 'salt');
                    $sth->execute(array(":login" => $login,
                                        ":email"  => $email,
                                        ":password" => $pass,
                                        ":name" => $name));
                    return true;
                }
            }
            return false;
        }
    }

?>