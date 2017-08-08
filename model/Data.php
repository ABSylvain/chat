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
            // NE PAS OUBLIER D'INSTANCIER VOTRE PDO, LA MIENNE EST FAITE AU MOMENT D'INTANCE DE DATA
            // on prepare notre requete sql 
            // le resultat du prepare est un objet contenant votre string mais aussi d'autre choses
            // dont des function, donc $query est un objet
            $query = $this->db->prepare('SELECT * FROM message');
            // on appel execute() de l'objet en question
            // puis execute transforme query en la reponce de sql
            $query->execute();
            // ici si tout vas bien au niveau de notre PDO et notre prepare
            // on ressoit un tableau, donc query = tableau

            // on vas utiliser fetchAll() pour placer chaque ligne du tableau sql 
            // dans des tableau differents
            // pour que chaque clé = value (columnMessage = message)
            // et non clé = value.value.value.value.ect (columnMessage = messageA.messageB.message3.ect)
            // puis tous ces tableau dans un meme tableau
            $tableauDeTableau = $query->fetchAll();
            // on encode tableauDeTableau en json et on le ressort avec le 'return'
            return json_encode($tableauDeTableau);
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
    public function verifPseudo($pseudo) {
        try{
            $query = $this->db->prepare("SELECT * FROM message WHERE pseudo=:pseudo");
            $query->bindParam(':pseudo', $pseudo);
            $query->execute();
            $tab = $query->fetchAll();
            return json_encode($tab);
        }catch(Exeption $exeption){
            echo $exeption->getMessage();
        }
    }
}
?>