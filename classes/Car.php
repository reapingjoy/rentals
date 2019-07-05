<?php

class Car {


  /**
   * Create New Car
   *
   * @param  array  $params
   */
  public function createNewCar($params) {

    $db = new DB();
    if(!$db->prepare("INSERT INTO car (model_id, engine_id, manufacture_year)
    VALUES (?, ?, ?)", 'iii')){
      return false;
    }

    if(!$db->execute([$params['car_model'], $params['car_engine'], $params['car_year']])) {
      return false;
    }
    if(!empty($params['features'])){
      if(!$db->prepare("INSERT INTO car_feature (car_id, feature_id)
      VALUES (?, ?)", 'ii')){
        return false;
      }
      $new_car_id = $db->insert_id;
      foreach($params['features'] as $feature) {
        if(!$db->execute([$new_car_id, $feature])){
          return false;
        }
      
      }
    }
    
    return true;
  }

  /**
   * Get All Cars
   *
   */
  public function getAllCars() {
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

  /**
   * Get All Brands
   *
   */
  public function getAllBrands() {

    $db = new DB();
    $db->prepare("SELECT * FROM brand");
    $brands = $db->execute_select();
    
    return $brands;
  }

  /**
   * Get All model by brand
   *
   * @param  int  $brand_id
   */
  public function getModelsByBrand($brand_id) {
    $db = new DB();
    $sql = "SELECT model.id, model.model_name
    FROM model
    INNER JOIN brand ON brand.id = model.brand_id
    WHERE brand.id = ?";

    if(!$db->prepare($sql, 'i')){
      throw new \Exception($db->error);  
    }

    $models = $db->execute_select([$brand_id]);
 
    return $models;
  }

  /**
   * Get All Engine Types
   *
   */
  public function getAllEngines(){
    $db = new DB();
    $db->prepare("SELECT * FROM engine");
    $engines = $db->execute_select();
    
    return $engines;
  }

  /**
   * Get All Features
   *
   */
  public function getAllFeatures(){
    $db = new DB();
    $db->prepare("SELECT * FROM feature");
    $features = $db->execute_select();
    
    return $features;
  }

  /**
   * Get single car features
   *
   * @param  int  $car_id
   */
  public function getCarFeatures($car_id) {

    $db = new DB();
    $sql = "SELECT feature.feature_name FROM car
    INNER JOIN car_feature ON car_feature.car_id = car.id
    INNER JOIN feature ON feature.id = car_feature.feature_id
    WHERE car.id = ?";

    if(!$db->prepare($sql, 'i')){
      throw new \Exception($db->error);  
    }
    
    $features = $db->execute_select([$car_id]);
    
    return $features;
  }


}

?>