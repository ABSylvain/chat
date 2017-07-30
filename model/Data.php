<?php 
class Data{

private $db;

public function __construct() {
    $this->db = new PDO('mysql:host=localhost;dbname=meetup;', 'root', 'root');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

}
?>