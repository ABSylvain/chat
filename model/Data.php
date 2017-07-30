<?php 
class Data{

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=meetup;', 'root', 'root');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function messageToSQL($message, $pseudo, $date) {
        try{
            $db = new PDO('mysql:host=localhost;dbname=chat;', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $db->prepare('INSERT INTO message (message, pseudo, instant)
                                VALUES (:message, :pseudo, :instant)');
            $query->bindParam(':message', $message);
            $query->bindParam(':pseudo', $pseudo);
            $query->bindParam(':instant', $date);
            $query->execute();
        }catch(Exeption $exeption){
            echo $exeption->getMessage();
        }
    }
}
?>