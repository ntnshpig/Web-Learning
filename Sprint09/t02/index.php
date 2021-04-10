<?php
    function autoload($pClassName) { 
        include(__DIR__. "/models/" . $pClassName. '.php'); 
    }
    spl_autoload_register("autoload");

    echo file_get_contents("index.html");

    if(isset($_POST['remind_pass'])) {
        $user = new Users();
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
?>
