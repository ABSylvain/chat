<?php 
header("Content-Type: text/plain"); 
include_once '../model/Data.php';

$db = new Data();

$tabs = $db->messageFromSQL();

echo $tabs

?>