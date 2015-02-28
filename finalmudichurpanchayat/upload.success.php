<?php 
include_once("database_connection.php");
session_start();
$tbl_name="gallery";
$uploadFilename= 'uploaded_files/'.basename( $_SESSION['FileName']).PHP_EOL;
echo $uploadFilename;
$UploadDate= date("d/m/y");
//$fileType=$_GET['gtype'];
echo $gtype;
//$UploadDate=now();
//echo $UploadDate;
$sql = "INSERT INTO $tbl_name(UploadDate, FilePath, scheme_type)VALUES('$UploadDate','$uploadFilename','$fileType')";

$result=mysql_query($sql);
if($result){
echo "Successful";
echo "<BR>";
echo "<a href='/avis9789979734/finalmudichurpanchayat/imagegallery.php'>Back to main page</a>";
}
// filename: upload.success.php 
//include 'upload.processor.php';
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd"> 

<html lang="en"> 
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"> 
         
        <link rel="stylesheet" type="text/css" href="stylesheet.css"> 
         
        <title>Successful upload</title> 
     
    </head> 
     
    <body> 
        <div id="Upload"> 
            <h1>File upload</h1> 
            <p>Congratulations! Your file upload was successful</p> 
        </div> 
     
    </body> 

</html>
