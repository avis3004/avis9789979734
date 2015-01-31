<?php
include_once("database_connection.php");

/* 
 * -------------------------------------------------------------------------------------------
 * Updated: 29.10.2009
 * This source code can only be used and altered together with ViaNett's SMS system.
 *
 * Requirements:
 * You need to have an ViaNett SMS account.
 * Register at: http://sms.vianett.com/cat/485.aspx
 * 
 * Support: smssupport@vianett.no.
 * -------------------------------------------------------------------------------------------
 */

/*
 * ViaNett SMS class provides an easy way of sending SMS messages through the HTTP API.
 * @package ViaNettSMS
 */
class ViaNettSMS
{
	private $Username;
	private $Password;
	
	/*
	 * Constructor with username and password to ViaNett gateway.
	 * @param string $Username
	 * @param string $Password
     */
	public function ViaNettSMS($Username, $Password)
	{
		$this->Username = $Username;
		$this->Password = $Password;
	}
	
	/*
	 * Send SMS message through the ViaNett HTTP API.
	 * @param string $MsgSender
	 * @param string $DestinationAddress
	 * @param string $Message
	 * @return Result $Result
	 */
	public function SendSMS($MsgSender, $DestinationAddress, $Message)
	{
		// Build URL request for sending SMS.
		$url = "http://smsc.vianett.no/ActiveServer/MT/?username=%s&password=%s&destinationaddr=%s&message=%s&refno=1";
		$url = sprintf($url, urlencode($this->Username), urlencode($this->Password), urlencode($DestinationAddress), urlencode($Message));
		
		// Check if MsgSender is numeric or alphanumeric.
		if (is_numeric($MsgSender))
			$url .= "&sourceAddr=" . $MsgSender;
		else
			$url .= "&fromAlpha=" . $MsgSender;
			
		// Get response as xml.
		$XMLResponse = $this->GetResponseAsXML($url);
		// Parse XML.
		$Result = $this->ParseXMLResponse($XMLResponse);
		// Return the result object.
		return $Result;
	}
	
	/*
	 * Gets the respone from the given URL, and return the response as xml.
	 * @param string $url
	 * @return object Response as xml
	 */
	private function GetResponseAsXML($url)
	{		
		try {
			// Download webpage and return response as xml.
			return simplexml_load_file($url);
		} catch (Exception $e) {
			// Failed to connect to server. Throw an exception with a customized message.
			throw new Exception('Error occured while connecting to server: ' . $e->getMessage());
		}
	}
	
	/*
	 * Parses the XML response
	 * @param objec $XMLResponse
	 * @return Result $Result
	 */
	private function ParseXMLResponse($XMLResponse)
	{
		$Result = new Result;
		$Result->ErrorCode = $XMLResponse[0]["errorcode"];
		$Result->ErrorMessage = $XMLResponse[0];
		$Result->Success = ($XMLResponse[0]["errorcode"] == 0);
		
		return $Result;
	}
}

/*
 * The result object which is returned by the SendSMS function in the package ViaNettSMS.
 * @package Result
 */
class Result
{
	public $Success;
	public $ErrorCode;
	public $ErrorMessage;
}
	


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
SendSMS($ContactNumber,$ComplaintDesc);
}

else {
echo "ERROR";
}
function SendSMS($ContactNumber,$ComplaintDesc)
{
	
// Declare variables.
$Username = "vsivachitra@yahoo.com";
$Password = "7sj5m ";
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
?> 

<?php 
// close connection 
mysql_close();
?>