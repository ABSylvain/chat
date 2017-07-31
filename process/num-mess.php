<?php 
include_once '../model/Data.php';

$db = new Data();

$tab = $db->numberMess();
echo $tab;
?>