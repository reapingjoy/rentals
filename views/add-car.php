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


<form action="/rentals/cars/form" method="post">
  
  Brand:<br>
  <select name="car_brand" required>
    <option value="">Please Select</option>
    <?php
    foreach($brands as $brand){
    echo  '<option value="'.$brand['id'].'">'.$brand['brand_name'].'</option>';
    }
  ?>
  </select>
  <br>

  Model:<br>
  <select name="car_model" required>
    <option value="">Please Select</option>
  </select>
  <br>

  Year:<br>
  <input type="text" name="car_year" required>
  <br>

  Engine:<br>
  <select name="car_engine">
    <option value="">Please Select</option>
    <?php
    foreach($engines as $engine){
    echo  '<option value="'.$engine['id'].'">'.$engine['fuel_type'].' - '.$engine['transmission'].'</option>';
    }
    ?>
  </select>
  <br>

  Features:<br>
  <ul style="list-style-type: none; padding: 0px;">
  <?php
    foreach($features as $feature){
    echo  '<li><input type="checkbox" name="features[]" value="'.$feature['id'].'">'.$feature['feature_name'].'</input></li>';
    }
  ?>
  </ul>
  <br>
  <?php 
  if(isset($status)) {
    if($status){
      echo '<h3 style = "color: green;">Car added succesfuly!</h3>';
    }else{
      echo '<h3 style = "color: red;">Something went wrong!</h3>';
    }
  }
  ?>
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