<?php 
header("Content-Type: text/plain");
include_once '../model/Data.php';

$db = new Data();

$json = $db->messageFromSQL();
// on ressort mon objet JSON 
echo $json;

?>