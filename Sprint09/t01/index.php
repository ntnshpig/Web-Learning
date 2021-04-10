<?php
    function autoload($pClassName) { 
        include(__DIR__. "/models/" . $pClassName. '.php'); 
    }
    spl_autoload_register("autoload");

    session_start();

    echo file_get_contents("index.html");

    
    $user = new Users();

    if(isset($_POST['sign_in'])) {
        if($user->sign_in($_POST['login'], $_POST['password'])) {
            $stat = $_SESSION['status'] ? "enable" : "disable";
            echo '<script>
                    document.querySelector(".logout_form").style.display = "flex";
                    document.querySelector(".sign_in_form").style.display = "none";
                    let status = document.querySelector(".status");
                    status.innerHTML = "Admin status: ' . $stat . '";
                    let msg = document.querySelector(".msg_in");
                    msg.innerHTML = "Enter succeed";
                    msg.style.color = "green";
                </script>';
        } else {
            echo '<script>
                    let msg = document.querySelector(".msg");
                    msg.innerHTML = "Enter failde";
                    msg.style.color = "red";
                </script>';
        }
    }
    if(isset($_POST['logout'])) {
        unset($_SESSION['status']);
        session_destroy();
    }
?>
