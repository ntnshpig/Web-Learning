<?php
    class Note {
        function __construct($name, $importance, $content) {
            $this->name = $name;
            $this->importance = $importance;
            $this->content = $content;
            $this->date = date('Y-m-d H:i:s');
        }
        public function __serialize() {
            return [
                "name" => $this->name,
                "importance" => $this->importance,
                "content" => $this->content,
                "date" => $this->date
            ];
        }
        public function __unserialize(array $data) {
            $this->name = $data["name"];
            $this->importance = $data["importance"];
            $this->content = $data["content"];
            $this->date = $data["date"];
        }
    }
?>