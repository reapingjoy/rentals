<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/rentals/assets/stylesheet.css">
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
  <select name="brand">
    <option value="">Please Select</option>
  </select>
  <br>

  Model:<br>
  <select name="model">
    <option value="">Please Select</option>
  </select>
  <br>

  Year:<br>
  <select name="year">
    <option value="">Please Select</option>
  </select>
  <br>

  Engine:<br>
  <select name="engine">
    <option value="">Please Select</option>
  </select>
  <br>

  Transmision:<br>
  <select name="transmision">
    <option value="">Please Select</option>
  </select>
  <br>

  Feature:<br>
  <select name="feature">
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
    <th>Transmission</th>
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