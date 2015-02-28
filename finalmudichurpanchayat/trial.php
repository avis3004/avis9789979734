<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Dialog - Default functionality</title>
   <link href="tria1css.css" rel="stylesheet"type="text/css">
 
</head>
<body>
<
<form action="#" method="post">
<select name="Color">
<option value="Red">Red</option>
<option value="Green">Green</option>
<option value="Blue">Blue</option>
<option value="Pink">Pink</option>
<option value="Yellow">Yellow</option>
</select>
<input type="submit" name="submit" value="Get Selected Values" />
</form>
<?php
session_start();
if(isset($_POST['submit'])){
$selected_val = $_POST['Color'];  // Storing Selected Value In Variable  // Displaying Selected Value

$_SESSION['gtype'] =$selected_val;
echo $_SESSION['gtype'];

}?>

 
 
</body>
</html>