<?php 
class Message{
    private $pseudo;
    private $message;
    private $instant;

    public function __construct($pseudo, $message) {
        $this->pseudo = $pseudo;
        $this->message = $message;
        $this->instant = new DateTime();
    }
    public function getPseudo() {
        return $this->pseudo;
    }
    public function getMessage() {
        return $this->message;
    }
    public function getDate() {
        return $this->date;
    }
}
?>