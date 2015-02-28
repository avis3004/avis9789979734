<?php
ini_set("error_reporting", E_ALL & ~E_DEPRECATED);
ob_start();
session_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="panchayat"; // Database name 
$tbl_name="registration"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT FirstName,UserType,Username FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
  $row = mysql_fetch_assoc($result);
  $_SESSION["usertype"] = $row["UserType"]; 
  $_SESSION["username"] = $row["FirstName"];
  $_SESSION["Uid"] = $row["Username"];
  echo $row[Username];
// Register $myusername, $mypassword and redirect to file "login_success.php"
  $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
  $_SESSION['expire'] = $_SESSION['start'] + (15*60);
 header("location:startfile.php");
}
else {
echo "<script>
alert('wrong username or password!!');
window.location.href='startfile.php';
</script>"; 
}
ob_end_flush();
?>