<?php
include 'MudichurPanchayat/database_connection.php';
if ($_POST) {
 $time_offset ="525"; // Change this to your time zone
$time_a = ($time_offset * 120);
$time = date("Y-m-d h:i:s",time() + $time_a); 
$news=$_POST['message'];
 $query=("INSERT INTO panchayat.newsfeed (idnewsfeed, newsDate, newsContent)
  VALUES (NULL, '$time', '$news');");
  $rs_dnews = mysql_query($query) or die("Query to get data from news table failed: " . mysql_error());
  }
  header('Location:startfile.php');
?>