<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/rentals/assets/stylesheet.css">
<script type="text/javascript" src="/rentals/assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/rentals/assets/js/app.js"></script>
</head>
<body>

<div class="container">

<h1>Add New Car</h1>

<form action="/rentals/bookings/bookings-by-date-range" method="post">
  
  Brand:<br>
  <select name="filter_brand">
    <option value="">Please Select</option>
  </select>
  <br>

  Model:<br>
  <select name="filter_model">
    <option value="">Please Select</option>
  </select>
  <br>

  Year:<br>
  <select name="filter_year">
    <option value="">Please Select</option>
  </select>
  <br>

  Engine:<br>
  <select name="filter_engine">
    <option value="">Please Select</option>
  </select>
  <br>

  Feature:<br>
  <select name="filter_feature">
    <option value="">Please Select</option>
  </select>
  <br>
  <br>
  <input type="submit" value="Add">
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