<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/rentals/assets/stylesheet.css">
<script type="text/javascript" src="/rentals/assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/rentals/assets/js/app.js"></script>
</head>
<body>

<div class="container">

<h1>View Reports</h1>

<form action="/rentals/bookings/bookings-by-date-range" method="post">
  Start Date:<br>
  <input type="date" name="filter_from" value="">
  <br>

  End Date:<br>
  <input type="date" name="filter_to" value="">
  <br>

  <br>
  <input type="submit" value="Search">
</form> 

<button onclick="goBack()" class="goback">Go Back</button>

</div>



<script>
function goBack() {
  window.history.back();
}
</script>

</body>
</html>