<?php

class Booking {

  /**
   * Create New Booking
   *
   * @param  string  $booked_from
   * @param  string  $booked_to
   * @param  int  $car_id
   * @param  int  $total
   */
  public function create($booked_from, $booked_to, $car_id, $total) {

    if(self::checkAvailability($booked_from, $booked_to, $car_id)){

      $db = new DB();
      $sql = "INSERT INTO booking (car_id, booked_from, booked_to, total)
      VALUES (?, ?, ?, ?)";

      if(!$db->prepare($sql, 'issd')){
        throw new \Exception($db->error);  
      }

      $booking = $db->execute([$car_id,$booked_from,$booked_to,$total]);
    } else {
      return false;
    }
    return true;
  }

  /**
   * Check Car Availability for a period
   *
   * @param  string  $booked_from
   * @param  string  $booked_to
   * @param  int  $car_id
   */
  public function checkAvailability($booked_from, $booked_to, $car_id) {

    $db = new DB();

    $sql="SELECT * FROM booking
    WHERE booking.car_id = ?
    AND ? <= booking.booked_to
    AND ? >= booking.booked_from";

    if(!$db->prepare($sql, 'iss')){
      throw new \Exception($db->error);  
    }

    $availability = $db->execute_select([$car_id,$booked_from,$booked_to]);

    if (empty($availability)) {
      return true;
    }
    return false;
  }

  /**
   * Get Number of workdays in a date period
   *
   * @param  string  $from
   * @param  string  $to
   */
  public function getWorkingDays($from, $to) {
    $workingDays = [1, 2, 3, 4, 5];
    $holidayDays = ['*-12-25', '*-01-01'];

    $from = new DateTime($from);
    $to = new DateTime($to);
    $to->modify('+1 day');
    $interval = new DateInterval('P1D');
    $periods = new DatePeriod($from, $interval, $to);

    $days = 0;
    foreach ($periods as $period) {
        if (!in_array($period->format('N'), $workingDays)) continue;
        if (in_array($period->format('Y-m-d'), $holidayDays)) continue;
        if (in_array($period->format('*-m-d'), $holidayDays)) continue;
        $days++;
    }
    return $days;
  }


  /**
   * Get Number of workdays in a date period
   *
   * @param  int  $workdays
   */
  public function checkTotal($workdays) {

    $db = new DB();
    $sql = "SELECT * FROM price_plan
    WHERE ? BETWEEN price_plan.rent_interval_start AND price_plan.rent_interval_end";

    if(!$db->prepare($sql, 'i')){
      throw new \Exception($db->error);  
    }
    
    $price_plan = $db->execute_select([$workdays]);
    
    $total = $price_plan[0]['price'] * $workdays;
    return $total;
  }


  /**
   * Get Booked brands
   *
   */
  public function getBookedBrands() {
    $db = new DB();
    $sql = "SELECT brand.id, brand.brand_name FROM booking
    INNER JOIN car ON car.id = booking.car_id
    INNER JOIN model ON model.id = car.model_id
    INNER JOIN brand ON brand.id = model.brand_id
    GROUP BY brand.id";

  if(!$db->prepare($sql)){
    throw new \Exception($db->error);  
  }
  
  $booked_brands = $db->execute_select([]);

  return $booked_brands;
  }


  /**
   * Get Models by brand
   *
   * @param  int  $brand_id
   */
  public function getModelsByBrand($brand_id) {

    $db = new DB();
    $sql = "SELECT model.id, model.model_name
    FROM booking
    INNER JOIN car ON car.id = booking.car_id
    INNER JOIN model ON model.id = car.model_id
    INNER JOIN brand ON brand.id = model.brand_id
    WHERE brand.id = ?
    GROUP BY model.id";

    if(!$db->prepare($sql, 'i')){
      throw new \Exception($db->error);  
    }

    $booked_models = $db->execute_select([$brand_id]);

    return $booked_models;
  }

  /**
   * Get Manufacture year by car model
   *
   * @param  int  $model_id
   */
  public function getYearsByModel($model_id) {

    $db = new DB();
    $sql = "SELECT DISTINCT car.manufacture_year
    FROM booking
    INNER JOIN car ON car.id = booking.car_id
    INNER JOIN model ON model.id = car.model_id
    WHERE model.id = ? ";

    if(!$db->prepare($sql, 'i')){
      throw new \Exception($db->error);  
    }

    $booked_model_years = $db->execute_select([$model_id]);

    return $booked_model_years;
  }


  /**
   * Get Booking by date range
   *
   * @param  string  $filter_from
   * @param  string  $filter_to
   */
  public function getBookingsByDateRange($filter_from, $filter_to) {

    $db = new DB();

    $sql="SELECT *, GROUP_CONCAT(feature.feature_name) AS features, booking.id AS booking_id, car.id AS car_id FROM booking
    INNER JOIN car ON car.id = booking.car_id
    INNER JOIN model ON model.id = car.model_id
    INNER JOIN brand ON brand.id = model.brand_id
    INNER JOIN engine ON engine.id = car.engine_id
    LEFT JOIN car_feature ON car_feature.car_id = car.id
    LEFT JOIN feature ON feature.id = car_feature.feature_id
    WHERE ? <= booking.booked_to
    AND ? >= booking.booked_from
    GROUP BY booking.id";

    if(!$db->prepare($sql, 'ss')){
      throw new \Exception($db->error);  
    }

    $bookings = $db->execute_select([$filter_from,$filter_to]);

    return $bookings;
  }


}

?>