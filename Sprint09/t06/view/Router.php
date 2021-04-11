<?php

    require_once __DIR__.'/../model/Remind.php';
    require_once __DIR__.'/../model/SignIn.php';
    require_once __DIR__.'/../model/SignUp.php';

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

        function call_action($action) {
            if($action == "Sign In") {
                $user = new SignIn();
                if($user->sign_in($_POST['login'], $_POST['password'])) {
                    ob_clean();
                    $show = New View("view/templates/main.html");
                    $show->render();
                    $stat = $_SESSION['status'] ? "enable" : "disable";
                    echo '<script>
                            let status = document.querySelector(".status");
                            status.innerHTML = "Admin status: ' . $stat . '";
                            let msg = document.querySelector(".msg_in");
                            msg.innerHTML = "Enter succeed";
                            msg.style.color = "green";
                        </script>';
                    $_SESSION['login'] = 'main';
                } else {
                    $show = New View("view/templates/sign_in.html");
                    $show->render();
                    echo '<script>
                            let msg = document.querySelector(".msg");
                            msg.innerHTML = "Enter failde";
                            msg.style.color = "red";
                        </script>';
                }
            }
            if($action == "Remind password") {
                $user = new Remind();
                if($user->remind_pass($_POST['login'])) {
                    echo '<script>
                            let msg = document.querySelector(".msg");
                            msg.innerHTML = "Send u a message";
                            msg.style.color = "green";
                        </script>';
                } else {
                    echo '<script>
                            let msg = document.querySelector(".msg");
                            msg.innerHTML = "Message failde";
                            msg.style.color = "red";
                        </script>';
                }
            }
            if($action == "Sign Up") {
                $user = new SignUp();
                if($user->sign_up($_POST['login'], $_POST['email'], $_POST['password'], $_POST['repeat'], $_POST['real_name'])){
                    $stat = $_SESSION['status'] ? "enable" : "disable";
                    ob_clean();
                    $show = New View("view/templates/main.html");
                    $show->render();
                    echo '<script>
                            let status = document.querySelector(".status");
                            status.innerHTML = "Admin status: ' . $stat . '";
                            let msg = document.querySelector(".msg_in");
                            msg.innerHTML = "Registration succeed";
                            msg.style.color = "green";
                        </script>';
                    $_SESSION['login'] = 'main';
                } else {

                    ob_clean();
                    $show = New View("view/templates/sign_up.html");
                    $show->render();
                    echo '<script>
                            let msg = document.querySelector(".msg");
                            msg.innerHTML = "Registration failde";
                            msg.style.color = "red";
                        </script>';
                }
            }
            if($action == "Logout") {
                unset($_SESSION['status']);
            }
        }

        public function call_router($action) {

            if($action == "reminder") {
                $show = New View("view/templates/reminder.html");
                $show->render();
            }

            if($action == "sign_in") {
                $show = New View("view/templates/sign_in.html");
                $show->render();
            }

            if($action == "sign_up") {
                $show = New View("view/templates/sign_up.html");
                $show->render();
            }
        }        
    }
?>