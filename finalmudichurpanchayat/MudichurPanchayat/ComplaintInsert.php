<?php
include_once("database_connection.php");
include_once("ViaNettSMS.php");
session_start();
$tbl_name="complaints"; // Table name 

// Get values from form 
$ComplaintType =$_POST['element_1'];
$ComplaintDateDD =$_POST['element_6_1'];
$ComplaintDateMM =$_POST['element_6_2'];
$ComplaintDateYYYY =$_POST['element_6_3'];
$ComplaintDesc = $_POST['element_5'];
$ContactNumber = $_POST['element_4'];
$ContactPersonName = $_POST['element_3_1'];
//DefaultContact Number set to President and Vasu
$DefaultContact =  '9789979734,'.'9677050053';
$WardNumber = $_POST['WardElement'];
$StreetName = $_POST['StreetName'];
$LoggedinUser= $_SESSION["Uid"];
$RandomNumber = rand(0,1000000);
//date_default_timezone_set();
date_default_timezone_set('Asia/Calcutta');
$CurrentTime = date('m/d/y h:i:s');
$sql="INSERT INTO $tbl_name(ComplaintType, ComplaintDateDD, ComplaintDateMM,ComplaintDateYYYY,ComplaintDesc, ContactPersonName,ContactNumber,WardNumber,StreetName,RandomNumber,CurrentTime)VALUES('$ComplaintType','$ComplaintDateDD','$ComplaintDateMM','$ComplaintDateYYYY','$ComplaintDesc','$ContactPersonName','$ContactNumber','$WardNumber','$StreetName','$RandomNumber','$CurrentTime')";
//echo $sql;
$SelectQuery="SELECT Phone FROM registration where Username='$LoggedinUser'";
$result=mysql_query($sql);
$SelectResult = mysql_query($SelectQuery);
$count=mysql_num_rows($SelectResult);
if($count==1){
  $row = mysql_fetch_assoc($SelectResult);
  $UserPhoneNo = $row['Phone'];
}
// if successfully insert data into database, displays message "Successful". 
if($result){
$RefernceNumQuery = "SELECT ComplaintRefId from complaints where RandomNumber = '$RandomNumber' and CurrentTime = '$CurrentTime'";
//echo $RefernceNumQuery;
$RefernceNumQueryResult = mysql_query($RefernceNumQuery);
$RefernceNumQueryCount = mysql_num_rows($RefernceNumQueryResult);
if($RefernceNumQueryCount ==1)
{
	$ReferenceRow = mysql_fetch_assoc($RefernceNumQueryResult);
	$FetchedReferenceNo = $ReferenceRow['ComplaintRefId'];
	$SMSText = "A Complaint has been Registered with Reference Number - " . $FetchedReferenceNo;
//	echo $FetchedReferenceNo;
}
echo "<BR>";
echo "<a href='/avis9789979734/finalmudichurpanchayat/startfile.php' target = '_top'>Back to main page</a>";
//SendSMS($ContactNumber,$ComplaintDesc);
SendSMSGateway($DefaultContact,$SMSText,$UserPhoneNo);
}

else {
echo "ERROR";
}
function SendSMSGateway($ContactNumber,$ComplaintDesc,$UserPhoneNo)
{
//$url = "http://login.smsgatewayhub.com/smsapi/pushsms.aspx?user=ashok.jan31&pwd=505909&to=9043228888&sid=WEBSMS&msg=Complaint%20Registered%20Successfully%20for%20StreetLights&fl=0&gwid=2";
$SanitizedMsg = trim(str_replace(' ','%20',$ComplaintDesc));
$url = "http://login.smsgatewayhub.com/smsapi/pushsms.aspx?user=ashok.jan31&pwd=505909&to=$ContactNumber,$UserPhoneNo&sid=WEBSMS&msg=$SanitizedMsg&fl=0&gwid=2";
echo $url;

//SMS Code Comented to avoid triggering of SMS in production
/*
$ch = curl_init();
// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL,$url);
// grab URL and pass it to the browser
curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);*/

}
?> 

<?php 
// close connection 
mysql_close();
?>