<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/rentals/assets/stylesheet.css">
<script type="text/javascript" src="/rentals/assets/jquery-3.4.1.min.js"></script>
</head>
<body>

<div class="container">
<h2>Booking Form</h2>

<form action="/action_page.php">
  Rental Start:<br>
  <input type="date" name="booked_from" value="">
  <br>
  Rental End:<br>
  <input type="date" name="booked_to" value="">
  <br>
  Car:<br>
  <select name="cars">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
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