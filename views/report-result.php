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
      <select name="brand_filter" data-filter="data-brand-name" class="filter-item">
        <option value="">Please Select</option>
        <?php
          foreach($brands as $brand){
            echo  '<option value="'.$brand.'">'.$brand.'</option>';
            }
        ?>
      </select>
    </td>
    <td>
      <select name="model_filter" data-filter="data-model-name" class="filter-item">
        <option value="">Please Select</option>
        <?php
          foreach($models as $model){
            echo  '<option value="'.$model.'">'.$model.'</option>';
            }
        ?>
      </select>
    </td>
    <td>
      <select name="year_filter" data-filter="data-year" class="filter-item">
        <option value="">Please Select</option>
        <?php
          foreach($years as $year){
            echo  '<option value="'.$year.'">'.$year.'</option>';
            }
        ?>
      </select>
    </td>
    <td>
    <select name="engine_filter" data-filter="data-engine" class="filter-item">
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
    echo  '<tr class= "booking-item">';
    echo  '<td>'.$booking['booking_id'].'</td>';
    echo  '<td data-brand-name="'.$booking['brand_name'].'">'.$booking['brand_name'].'</td>';
    echo  '<td data-model-name="'.$booking['model_name'].'">'.$booking['model_name'].'</td>';
    echo  '<td data-year="'.$booking['manufacture_year'].'">'.$booking['manufacture_year'].'</td>';
    echo  '<td data-engine="'.$booking['fuel_type'].' - '.$booking['transmission'].'">'.$booking['fuel_type'].' - '.$booking['transmission'].'</td>';
    echo  '<td>'.$booking['features'].'</td>';
    echo  '<td>'.$booking['booked_from'].'</td>';
    echo  '<td>'.$booking['booked_to'].'</td>';
    echo  '<td data-total="'.$booking['total'].'">'.$booking['total'].'</td>';
    echo  '</tr>';
    }
  ?>
  <tr>
    <td colspan=8></td>
    <td class="total-sum"></td>
  </tr>
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