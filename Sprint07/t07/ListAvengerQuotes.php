<?php
    class ListAvengerQuotes {
        protected $_list = [];

        public function addAvengerQuote($avengerQuote) {
            array_push($this->_list, $avengerQuote);
        }
        public function toXML($filename) {
            $file = fopen($filename, "w");
            $xml = new SimpleXMLElement('<document/>');
            foreach ($this->_list as $quote) {
                $xml_quote = $xml->addChild("quote");
                $xml_quote->addChild("id", $quote->id);
                $xml_quote->addChild("author", $quote->author);
                $xml_quote->addChild("quote", $quote->quote);
                $xml_photos = $xml_quote->addChild("photos");
                foreach((array)$quote->photos as $photo){
                    $xml_photos->addChild("photo", $photo);
                }
                $xml_quote->addChild("publishDate", $quote->date);
                $xml_comments = $xml_quote->addChild("comments");
                foreach((array)$quote->getComments() as $comment) {
                    $xml_comment = $xml_comments->addChild("comment");
                    foreach((array)$comment->date as $date){
                        $xml_comment->addChild("date", $date);
                    }
                    foreach((array)$comment->text as $text){
                        $xml_comment->addChild("text", $text);
                    }
                }
            }
            file_put_contents($filename, $xml->asXML());
            fclose($file);
        }
        public function fromXML($filename) {
            $file = fopen($filename, "r");
            $xml_obj = simplexml_load_file($filename);
            $list = new ListAvengerQuotes();
            foreach($xml_obj->children() as $quotes) {
                $id = $quotes->id->__toString();
                $author = $quotes->author->__toString();
                $quote = $quotes->quote->__toString();
                $photos = array();
                foreach ((array)$quotes->photos as $photo){
                    $photos = $photo;
                }
                $avengerQuote = new AvengerQuote( $id, $author, $quote, $photos );
                $comments = array();
                foreach ((array)$quotes->comments as $comment){
                    $comments = $comment;
                }
                $avengerQuote->setComments($comments);
                $list->addAvengerQuote($avengerQuote);
            }
            fclose($file);
            return $list;
        }
    }
?>
