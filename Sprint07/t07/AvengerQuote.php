
<?php
    class AvengerQuote {
        protected $comments = [];
        public function __construct($id, $author, $quote, $photos) {
            $this->id = $id;
            $this->author = $author;
            $this->quote = $quote;
            $this->photos = $photos;
            $this->date = date('Y-m-d');
        }
        public function getComments() { 
            return $this->comments; 
        }
        public function addComment($text) {
            array_push($this->comments, new Comment($text));
        }
        public function setComments($comments) {
            $this->comments = $comments;
        }
    }
?>