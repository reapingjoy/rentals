<?php

require('DB.php');

class Car {

  public function index(){
    
  }

  public function getAllCars(){
    $db = new DB();
    $db->prepare("SELECT * FROM brand");
    $cars = $db->execute_select();
    
    return $cars;
  }

  public function getAllBrands(){
    $db = new DB();
    $db->prepare("SELECT * FROM brand");
    $brands = $db->execute_select();
    
    return $brands;
  }

  public function getModelsByBrand(){
    // $db = new DB();
    // $db->prepare("SELECT * FROM brand");
    // $brands = $db->execute_select();
    
    // return $brands;
  }

}

?>