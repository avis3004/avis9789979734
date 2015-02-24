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

 header("location:startfile.php");
}
else {
?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>jQuery UI Dialog functionality</title>
      <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- CSS -->
      <style>
         .ui-widget-header,.ui-state-default, ui-button{
            background:#b9cd6d;
            border: 1px solid #b9cd6d;
            color: #FFFFFF;
            font-weight: bold;
         }
      </style>
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#dialog-3" ).dialog({
               autoOpen: false, 
               hide: "puff",
               show : "slide",
               height: 200      
            });
            $( "#opener-3" ).click(function() {
               $( "#dialog-3" ).dialog( "open" );
            });
         });
      </script>
   </head>
   <body>
      <!-- HTML --> 
      <div id="dialog-3" title="Dialog Title goes here...">This my first jQuery UI Dialog!</div>
     
   </body>
</html>
<?php
}
ob_end_flush();
?>