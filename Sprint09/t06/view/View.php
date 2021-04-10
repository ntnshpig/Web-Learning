<?php
    class View {
        function __construct($url) {
            $this->content = NULL;
            $this->content = file_get_contents($url);
        }

        function render() {
            ob_clean();
            echo $this->content;
        }
    }
?>