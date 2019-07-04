<?php

class Booking {

  public function create() {
    print_r($_POST);
  }

  public function checkAvailability($booked_from, $booked_to, $car_id) {

    $db = new DB();
    $sql = "SELECT booking.id FROM booking
    WHERE NOT EXIST (
    SELECT * FROM booking
    WHERE booking.car_id = ?
    AND ? <= booking.booked_to
    AND ? >= booking.booked_from )
    AND booking.car_id = ? ";

    if(!$db->prepare($sql, 'i')){
      throw new \Exception($db->error);  
    }

    $availability = $db->execute_select([$car_id,$booked_from,$booked_to,$car_id]);

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