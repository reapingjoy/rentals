<!DOCTYPE html>
<html>
<body>

<h2>Add New Car</h2>

<form action="/action_page.php">
  Brand:<br>
  <select>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
</select>
  <br>
  Model:<br>
  <select>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
</select>
  <br><br>
  <input type="submit" value="Submit">
</form> 

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>

</body>
</html>