<?php 
    class File {
        function __construct($file_name) {
            $this->file_name = $file_name;

            if(!file_exists("tmp")) {
                mkdir("tmp");
            }
        }

        function write($content) {
            if(file_exists($this->file_name)) {
                file_put_contents($this->file_name, $content, FILE_APPEND);
            } else {
                file_put_contents ($this->file_name, $content);
            }
        }
    }
?>