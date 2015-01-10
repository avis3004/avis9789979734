<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="panchayat"; // Database name 
$tbl_name="registration"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$FirstName =$_POST['element_1_1'];
$LastName =$_POST['element_1_2'];
$Gender = $_POST['element_10'];
if ($Gender == 1)
{
	$Gender = 'Male';
}
elseif($Gender == 2)
{
	$Gender = "Female";
}
echo $Gender;
//$Gender = "Male";
$StreetAddress=$_POST['element_2_1'];
$AddressLine2=$_POST['element_2_2'];
$City =$_POST['element_2_3'];
$State = $_POST['element_2_4'];
$Postal = $_POST['element_2_5'];
$Country = $_POST['element_2_6'];
$Phone  = $_POST['element_3'];
$Email  = $_POST['element_4'];
$username = $_POST['element_7'];
$Password = $_POST['element_9'];

// Insert data into mysql 
$sql="INSERT INTO $tbl_name(FirstName, LastName, Gender, StreetAddress, Line2, City,State, Zip, Country, Phone, Email, Username, Password)VALUES('$FirstName', '$LastName', '$Gender','$StreetAddress','$AddressLine2','$City','$State',$Postal,'$Country','$Phone','$Email','$username','$Password')";
//echo $sql;
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful". 
if($result){
echo "Successful";
echo "<BR>";
echo "<a href='form.html'>Back to main page</a>";
}

else {
echo "ERROR";
}
?> 

<?php 
// close connection 
mysql_close();
?>