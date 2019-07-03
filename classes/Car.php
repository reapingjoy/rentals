<?php

require('DB.php');

class Car {

  public function index(){
    $db = new DB();
    $db->prepare("SELECT * FROM brand");
    $result = $db->execute_select();
    
    return $result;
  }

  public function show(){
    echo "Nedko Show";
  }

}

?>