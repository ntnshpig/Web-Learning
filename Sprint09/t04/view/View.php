
<?php
    class View {
        function __construct($url) {
            $this->content = file_get_contents($url);
        }

        function render() {
            echo $this->content;
        }
    }
    
    /*$test = new View('https://onlyfans.com/');
    $test->render();*/
    
?>