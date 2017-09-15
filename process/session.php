<?php 
include_once '../model/Bob.php';
include_once '../model/Data.php';
session_start();
$bob = new Bob();
$data = new Data();
$pseudo = $_POST['pseudo'];
echo $pseudo;
$json = $data->verifPseudo($pseudo);
$json = json_decode($json);

foreach($json as $tab){
    foreach($tab as $value){
        if(preg_match('#'.$value.'#i', $pseudo)){
            $_SESSION['user'] = $pseudo;
            echo 'connecter';
        }
    }
}

?>