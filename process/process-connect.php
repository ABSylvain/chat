<?php 

include_once '../model/Message.php';

$message = htmlspecialchars($_POST['message']);

echo $message;

?>