<?php
include 'header.php';
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload form</title>
</head>
<body>

<section>
<table width="1172" border="1">
  <tr>
    <td height="110" colspan="2">
	<div>
		<center		<h1>UPLOAD YOUR FILES HERE...</h1></center>
		
                 </div>       </td>
  </tr>
  <tr>
    <td>
	Insert the news inside the box:
	<form action="<?php $_PHP_SELF ?>" method="post">
	<textarea name="message" rows="10" cols="30">
    </textarea>
    
	<input type="submit" />
	</form></td>
    <td>
	<?php
			include 'GalleryUpload.php';
			?></td>
  </tr>
</table>

</section>
<?php
        include 'footer.php';
        ?>
</body>
</html>
