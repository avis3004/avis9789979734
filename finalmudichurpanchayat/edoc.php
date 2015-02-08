<?php
include 'header.php';
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
	<form action="newsinsert.php" method="post">
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
