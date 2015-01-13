<?php
$WardNumber=$_REQUEST['WardNumber'];
include_once("database_connection.php");

$sql="SELECT StreetName FROM ward where WardNumber='$WardNumber'";	
$query = mysql_query($sql);
while ($row = mysql_fetch_assoc($query))
{
	$rows[] = $row;
}
echo json_encode($rows);
?>