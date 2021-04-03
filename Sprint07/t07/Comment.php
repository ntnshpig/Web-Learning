<?php
    class Comment {
        public function __construct($text) {
            $this->date = date('Y-m-d');
            $this->text = $text;
        }
    }
?>