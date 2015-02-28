<?php
include 'header.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload form</title>
        <link href="otherlinks.css" rel="stylesheet"type="text/css">

</head>
<body>

<section>
 <div class="gline">
                    <code><h1><center>UPLOAD YOUR FILES HERE</center></h1></code></div>
<table width="1172" border="0">
  <tr>
    <td height="60" colspan="2">
	
	 </td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC">
    <h2> <center>Gallery upload <img src="images/upload.png" width="90" height="95" /></center></h2> 
        <center>
	<?php
			include 'GalleryUpload.php';
			?>
            </center></td>
    <td bgcolor="#CCCCCC">
	<h3>INSERT NEWSFEED</h3>
	<form action="newsinsert.php" method="post">
	<textarea name="message" rows="10" cols="30">
    </textarea>
   	<input type="submit" />
	</form></td>
  
  </tr>
</table>

</section>
<?php
        include 'footer.php';
        ?>
</body>
</html>
