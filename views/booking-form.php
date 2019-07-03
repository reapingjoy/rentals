<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/rentals/assets/stylesheet.css">
<script type="text/javascript" src="/rentals/assets/jquery-3.4.1.min.js"></script>
</head>
<body>

<div class="container">
<h2>Booking Form</h2>

<form action="/rentals/bookings/create" method="post">
  Rental Start:<br>
  <input type="date" name="booked_from" value="">
  <br>
  Rental End:<br>
  <input type="date" name="booked_to" value="">
  <br>
  Car:<br>
  <select name="cars">
  <?php
    foreach($cars as $car){
    echo  '<option value="'.$car['id'].'">'.$car['car_short'].'</option>';
    }
  ?>
  </select>
  <br>
  <input type="submit" value="Search">
</form> 

</div>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>


</body>
</html>