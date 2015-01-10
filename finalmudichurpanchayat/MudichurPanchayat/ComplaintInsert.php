<?php
include_once("ViaNettSMS.php");
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="panchayat"; // Database name 
$tbl_name="complaints"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$ComplaintType =$_POST['element_1'];
$ComplaintDateDD =$_POST['element_6_1'];
$ComplaintDateMM =$_POST['element_6_2'];
$ComplaintDateYYYY =$_POST['element_6_3'];
$ComplaintDesc = $_POST['element_5'];
$ContactPersonName = $_POST['element_3_1'];
$ContactNumber = $_POST['element_4'];

$sql="INSERT INTO $tbl_name(ComplaintType, ComplaintDateDD, ComplaintDateMM, ComplaintDateYYYY, ComplaintDesc, ContactPersonName,ContactNumber)VALUES('$ComplaintType','$ComplaintDateDD','$ComplaintDateMM','$ComplaintDateYYYY','$ComplaintDesc','$ContactPersonName','$ContactNumber')";
//echo $sql;
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful". 
if($result){
echo "Successful";
echo "<BR>";
echo "<a href='/avis9789979734/finalmudichurpanchayat/startfile.php'>Back to main page</a>";
SendSMS($ContactNumber,$ComplaintDesc);
}

else {
echo "ERROR";
}
function SendSMS($ContactNumber,$ComplaintDesc)
{
	
// Declare variables.
$Username = "sivaganeshvbe@gmail.com";
$Password = "7gl6q";
$MsgSender = "919789979734";
$DestinationAddress = $ContactNumber;
$Message = $ComplaintDesc;

// Create ViaNettSMS object with params $Username and $Password
$ViaNettSMS = new ViaNettSMS($Username, $Password);
try
{
	// Send SMS through the HTTP API
	$Result = $ViaNettSMS->SendSMS($MsgSender, $DestinationAddress, $Message);
	// Check result object returned and give response to end user according to success or not.
	if ($Result->Success == true)
		$Message = "Message successfully sent!";
	else
		$Message = "Error occured while sending SMS<br />Errorcode: " . $Result->ErrorCode . "<br />Errormessage: " . $Result->ErrorMessage;
}
catch (Exception $e)
{
	//Error occured while connecting to server.
	$Message = $e->getMessage();
}

}
?> 

<?php 
// close connection 
mysql_close();
?>