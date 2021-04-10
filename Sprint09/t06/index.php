<?php
    session_start();


    require_once __DIR__.'/controller/Controller.php';
    require_once __DIR__.'/view/View.php';
    require_once __DIR__.'/model/connection/DatabaseConnection.php';
    require_once __DIR__.'/model/Model.php';
    require_once __DIR__.'/model/Remind.php';
    require_once __DIR__.'/model/SignIn.php';
    require_once __DIR__.'/model/SignUp.php';
    require_once __DIR__.'/model/Router.php';

    if(!$_SESSION['page']) {
        $_SESSION['page'] = 'login';
    }

    
    
?>