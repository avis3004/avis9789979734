<?php
$uname=$_REQUEST['uname'];
if(preg_match("/[^a-z0-9]/",$uname))
{
print "<span style=\"color:red;\">Username contains illegal charaters.</span>";
exit;
}
mysql_connect("localhost","root","");
mysql_select_db("panchayat");
$data=mysql_query("SELECT * FROM registration where Username='$uname'");
if(mysql_num_rows($data)>0)
{
//print "<span style=\"color:red;\">Username already exists :(</span>";
echo 'Not Ok';	
}
else
{
//print "<span style=\"color:green;\">Username is available :)</span>";
	echo 'Ok';
}
?>