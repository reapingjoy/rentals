<?php

require('DB.php');

class Car {

  public function index(){
    
  }

  public function getAllCars(){
    $db = new DB();
    $sql = "SELECT car.id, brand.brand_name, model.model_name, engine.fuel_type, engine.transmission, car.manufacture_year , CONCAT_WS(',' ,brand.brand_name, model.model_name, engine.fuel_type, engine.transmission, car.manufacture_year) AS car_short
    FROM car
    INNER JOIN model ON model.id = car.model_id
    INNER JOIN engine ON engine.id = car.engine_id
    INNER JOIN brand ON model.brand_id = brand.id";
    
    $db->prepare($sql);
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

  public function getCarFeatures(){
    // $db = new DB();
    // $db->prepare("SELECT * FROM brand");
    // $brands = $db->execute_select();
    
    // return $brands;
  }

}

?>