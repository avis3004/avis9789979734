<?php
include_once("database_connection.php");
include_once("ViaNettSMS.php");

$tbl_name="complaints"; // Table name 
// Get values from form 
$ComplaintType =$_POST['element_1'];
$ComplaintDateDD =$_POST['element_6_1'];
$ComplaintDateMM =$_POST['element_6_2'];
$ComplaintDateYYYY =$_POST['element_6_3'];
$ComplaintDesc = $_POST['element_5'];
$ContactPersonName = $_POST['element_3_1'];
$ContactNumber = $_POST['element_4'];
$WardNumber = $_POST['WardElement'];
$StreetName = $_POST['StreetName'];

$sql="INSERT INTO $tbl_name(ComplaintType, ComplaintDateDD, ComplaintDateMM, ComplaintDateYYYY, ComplaintDesc, ContactPersonName,ContactNumber,WardNumber,StreetName)VALUES('$ComplaintType','$ComplaintDateDD','$ComplaintDateMM','$ComplaintDateYYYY','$ComplaintDesc','$ContactPersonName','$ContactNumber','$WardNumber','$StreetName')";
//echo $sql;
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful". 
if($result){
echo "Successful";
echo "<BR>";
echo "<a href='/avis9789979734/finalmudichurpanchayat/startfile.php'>Back to main page</a>";
//SendSMS($ContactNumber,$ComplaintDesc);
SendSMSGateway();
}

else {
echo "ERROR";
}
function SendSMS($ContactNumber,$ComplaintDesc)
{
	
// Declare variables.
$Username = "ashok.jan31@gmail.com";
$Password = "1t5zv";
$MsgSender = "919789885126";
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
function SendSMSGateway()
{
$url = "http://login.smsgatewayhub.com/smsapi/pushsms.aspx?user=ashok.jan31&pwd=505909&to=9043228888&sid=WEBSMS&msg=Complaint%20Registered%20Successfully%20for%20StreetLights&fl=0&gwid=2";
echo $url;
// create a new cURL resource
$ch = curl_init();
// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL,$url);
// grab URL and pass it to the browser
curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);

}
?> 

<?php 
// close connection 
mysql_close();
?>