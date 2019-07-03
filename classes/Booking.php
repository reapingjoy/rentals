<?php

class Booking {

  public function create() {
    print_r($_POST['booked_from']);
  }

  public function checkAvailability() {
    
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
    echo $days;
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

    echo $total;
    return $total;
  }


}

?>