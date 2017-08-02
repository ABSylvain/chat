<?php 
class Data{

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=chat;', 'root', 'root');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function messageToSQL($message, $pseudo, $date) {
        try{
            $query = $this->db->prepare('INSERT INTO message (message, pseudo, instant)
                                                    VALUES (:message, :pseudo, :instant)');
            $query->bindParam(':message', $message);
            $query->bindParam(':pseudo', $pseudo);
            $query->bindParam(':instant', $date);
            $query->execute();
        }catch(Exeption $exeption){
            echo $exeption->getMessage();
        }
    }

    public function messageFromSQL() {
        try{
            $query = $this->db->prepare('SELECT * FROM message');
            $query->execute();
            $obj = $query->fetchAll();
            return json_encode($obj);
        }catch(Exeption $exeption){
            echo $exeption->getMessage();
        } 
           
    }

    public function numberMess() {
        try{
            $query = $this->db->prepare('SELECT SUM(num) FROM message');
            $query->execute();
            $obj = $query->fetch();
            return json_encode($obj);
        }catch(Exeption $exeption){
            echo $exeption->getMessage();
        } 
    }
}
?>