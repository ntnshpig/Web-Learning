<?php
    class FilesList {
        function __construct($path) {
            $this->files = [];
            if(file_exists($path)) {
                $this->files = array_diff(scandir($path), array('.', '..'));
            }
        }

        function toList() {
            $res = '';
            foreach($this->files as $el => $val) {
                $res = $res . '<ul><li><a href="?file=' . $val . '">' . $val . '</a></li></ul>';
            }
            return $res;
        }
    } 
?>