<?php 
header("Content-Type: text/plain"); 
include_once '../model/Message.php';
include_once '../model/Data.php';

$message = htmlspecialchars($_POST['message']);
$pseudo = htmlspecialchars($_POST['pseudo']);
$instant = new DateTime();
$date = $instant->format('Y-m-d');

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
?>