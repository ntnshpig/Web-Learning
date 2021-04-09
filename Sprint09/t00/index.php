<?php
    function autoload($pClassName) { 
        include(__DIR__. 'models/' . $pClassName. '.php'); 
    }
    spl_autoload_register("autoload");
    session_start();

    include 'connection/DatabaseConnection.php';

    if(isset($_POST['sign_up'])) {
        if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['repeat']) 
        && isset($_POST['real_name']) && isset($_POST['email']) && isset($_POST['repeat'])){
            $user = new Users;
            $user->save($_POST['login'], $_POST['email'], $_POST['password'], $_POST['repeat'], $_POST['real_name']);
        }
    }
?>
