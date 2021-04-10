<?php
    include "ControllerInterface.php";
    include __DIR__.'/../view/View.php';

    class Main implements ControllerInterface {
        private $view;

        function __construct() {
            $this->view = New View('../view/templates/main.html');
        }

        function execute() {
            $this->view->render();
        }
    }

    $test = New Main();
    $test->execute();
?>
