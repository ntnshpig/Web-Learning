
<?php
    require_once "Model.php";

    class SignUp  extends Model {
        public $login;
        public $email;
        public $password;
        public $name;

        public function __construct() {
            parent::__construct("users");
        }

        public function sign_up($login, $email, $password, $repeat, $name) {
            if ($this->db_new->getConnectionStatus() == true) {
                $newTable = $this->db_new->db_connection->query("SELECT id, login FROM " . $this->table . " WHERE login = '" . $login . "' or " . " email_address = '" . $email . "';");
                $arr = $newTable->fetch(PDO::FETCH_ASSOC);
                if($arr || ($password != $repeat)) {
                    return false;
                } else {
                    $sql = "INSERT INTO users (login, email_address, password, full_name, status_admin) VALUES (:login, :email_address, :password, :name, :status_admin)";
                    $sth = $this->db_new->db_connection->prepare($sql);
                    $pass = crypt($password, 'salt');
                    $sth->execute(array(":login" => $login,
                                        ":email_address"  => $email,
                                        ":password" => $pass,
                                        ":name" => $name,
                                        ":status_admin" => 0));
                    $this->login = $login;
                    $this->password = $password;
                    $this->email = $email;
                    $this->name = $name;
                    $_SESSION['status'] = 0;
                    return true;
                }
            }
            return false;
        }
    }
?>