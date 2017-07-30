<?php 
header("Content-Type: text/plain"); 
include_once '../model/Message.php';
include_once '../model/Data.php';
$db = new Data();
$message = htmlspecialchars($_POST['message']);
$pseudo = htmlspecialchars($_POST['pseudo']);
$instant = new DateTime();
$date = $instant->format('Y-m-d');

$db->messageToSQL($message, $pseudo, $date);


?>