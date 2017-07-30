<?php 
header("Content-Type: text/plain"); 
include_once '../model/Message.php';
include_once '../model/Data.php';

$mess = htmlspecialchars($_POST['message']);

echo $mess;

?>