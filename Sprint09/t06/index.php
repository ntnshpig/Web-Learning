<?php
    session_start();

    require_once __DIR__.'/controller/Controller.php';
    require_once __DIR__.'/view/View.php';
    require_once __DIR__.'/view/Router.php';
    require_once __DIR__.'/model/connection/DatabaseConnection.php';
    require_once __DIR__.'/model/Model.php';
    require_once __DIR__.'/model/Remind.php';
    require_once __DIR__.'/model/SignIn.php';
    require_once __DIR__.'/model/SignUp.php';

    if(!$_SESSION['page']) {
        $_SESSION['page'] = 'sign_in';
    }

    if(!isset($_GET['moveto']) && !isset($_POST['moveto'])) {
        $show = New View('view/templates/' . $_SESSION['page'] . ".html");
        $show->render();
    }

    if(isset($_POST['moveto'])) {
        $router = new Router();
        $router->call_router($_POST['moveto']);
    }
    if(isset($_GET['moveto'])) {
        $router = new Router();
        $router->call_router($_GET['moveto']);
    }

    if(isset($_POST['moveto'])) {
        $router = new Router();
        $router->call_action($_POST['moveto']);
    }

    if(isset($_POST['logout'])) {
        $_SESSION['status'] = '';
        $_SESSION['page'] = 'sign_in';
        session_destroy();
    }
?>