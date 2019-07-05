<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/rentals/assets/stylesheet.css">
<script type="text/javascript" src="/rentals/assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/rentals/assets/js/app.js"></script>
</head>
<body>

<div class="container" style="width: 90%;">

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
    <td>
      <select name="brand_filter">
        <option value="">Please Select</option>
        <?php
          foreach($brands as $brand){
            echo  '<option value="'.$brand.'">'.$brand.'</option>';
            }
        ?>
      </select>
    </td>
    <td>
      <select name="model_filter">
        <option value="">Please Select</option>
        <?php
          foreach($models as $model){
            echo  '<option value="'.$model.'">'.$model.'</option>';
            }
        ?>
      </select>
    </td>
    <td>
      <select name="year_filter">
        <option value="">Please Select</option>
        <?php
          foreach($years as $year){
            echo  '<option value="'.$year.'">'.$year.'</option>';
            }
        ?>
      </select>
    </td>
    <td>
    <select name="engine_filter">
        <option value="">Please Select</option>
        <?php
          foreach($engines as $engine){
            echo  '<option value="'.$engine.'">'.$engine.'</option>';
            }
        ?>
      </select>
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <?php
    foreach($bookings as $booking){
    echo  '<tr>';
    echo  '<td>'.$booking['booking_id'].'</td>';
    echo  '<td>'.$booking['brand_name'].'</td>';
    echo  '<td>'.$booking['model_name'].'</td>';
    echo  '<td>'.$booking['manufacture_year'].'</td>';
    echo  '<td>'.$booking['fuel_type'].' - '.$booking['transmission'].'</td>';
    echo  '<td>'.$booking['features'].'</td>';
    echo  '<td>'.$booking['booked_from'].'</td>';
    echo  '<td>'.$booking['booked_to'].'</td>';
    echo  '<td>'.$booking['total'].'</td>';
    echo  '</tr>';
    }
  ?>
</table>



<button onclick="goBack()" class="goback">Go Back</button>

</div>

<script>
function goBack() {
  window.history.back();
}
</script>

</body>
</html>