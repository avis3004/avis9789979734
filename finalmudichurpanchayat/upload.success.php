<?php
 include_once("database_connection.php");
session_start();
$tbl_name="gallery";
$uploadFilename= 'uploaded_files/'.basename( $_SESSION['FileName']).PHP_EOL;
//echo $uploadFilename;
$fileType=$_SESSION['gtype'];
$UploadDate= date("d/m/y");
//echo $fileType;
//echo $gtype;
//$UploadDate=now();
//echo $UploadDate;
$sql = "INSERT INTO $tbl_name(UploadDate, FilePath,scheme_type)VALUES('$UploadDate','$uploadFilename','$fileType')";

$result=mysql_query($sql);
if($result){
echo "<script>
alert('Congratulations! Your file upload was successful');
window.location.href='imagegallery.php';
</script>"; 
    exit; 
} // end error handler 

// filename: upload.success.php 
//include 'upload.processor.php';
?>