<?php
$ComplaintType=$_REQUEST['ComplaintType'];
/*mysql_connect("localhost","root","");
mysql_select_db("panchayat");*/
include_once("database_connection.php");
$result=mysql_query("SELECT ContactPersonName,TelephoneNo FROM departmentdetails where ComplaintType='$ComplaintType'");	

//$result = mysql_query($data);
if (!$result)
 {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($result) == 0) 
{
    echo "No rows found, nothing to print so am exiting";
    exit;
}
if ($row = mysql_fetch_assoc($result))
{
	//echo json_encode($ComplaintResponse);	
	echo json_encode($row);
	//echo ($ComplaintResponse);
}
else
{
//print "<span style=\"color:green;\">Username is available :)</span>";
	echo 'Not Ok';
}
?>