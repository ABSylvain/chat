<?php 
include_once '../Bob.php';
$bob = new Bob();
$pseudo = htmlspecialchars($_POST['pseudo']);
$bob->whatThat($pseudo);
if(isset($_SESSION['user'])){
    session_start();
    $_SESSION['user'] = $pseudo;
}else{
    echo '';
}





?>