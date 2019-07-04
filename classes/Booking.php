<?php

class Booking {

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
      echo 'Not Available!';
    }
    
  }

  public function checkAvailability($booked_from, $booked_to, $car_id) {

    $db = new DB();

    $sql="SELECT * FROM booking
    WHERE booking.car_id = ?
    AND ? <= booking.booked_to
    AND ? >= booking.booked_from";

    // $sql = "SELECT booking.id FROM booking
    // WHERE NOT EXISTS (
    // SELECT * FROM booking
    // WHERE booking.car_id = ?
    // AND ? <= booking.booked_to
    // AND ? >= booking.booked_from )
    // AND booking.car_id = ? ";

    if(!$db->prepare($sql, 'iss')){
      throw new \Exception($db->error);  
    }

    $availability = $db->execute_select([$car_id,$booked_from,$booked_to]);

    if (empty($availability)) {
      return true;
    }
    return false;
    }

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


}

?>