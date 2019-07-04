<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/rentals/assets/stylesheet.css">
<script type="text/javascript" src="/rentals/assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/rentals/assets/js/app.js"></script>
</head>
<body>



<h1>View Reports</h1>

<form action="/rentals/bookings" method="post">
  Start Date:<br>
  <input type="date" name="filter_from" value="">
  <br>

  End Date:<br>
  <input type="date" name="filter_to" value="">
  <br>

  Brand:<br>
  <select name="filter_brand">
    <option value="">Please Select</option>
    <?php
    foreach($booked_brands as $booked_brand){
    echo  '<option value="'.$booked_brand['id'].'">'.$booked_brand['brand_name'].'</option>';
    }
    ?>
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
  <input type="submit" value="Search">
</form> 

<h2>List Bookings</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Brand</th>
    <th>Model</th>
    <th>Year</th>
    <th>Engine</th>
    <th>Feature</th>
    <th>Booked From</th>
    <th>Booked To</th>
    <th>Total</th>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>



<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>

</body>
</html>