
<?php
    include "Model.php";

    class Users extends Model{
        public $id;
        public $login;
        public $email;
        public $password;
        public $name;

        public function __construct() {
            parent::__construct("users");
        }

        
    }

?>