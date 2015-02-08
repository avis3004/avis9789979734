
<!DOCTYPE html>
<html>
<head>
<style>
div.img {
    margin: 5px;
    padding: 5px;
    border: 1px solid #0000ff;
    height: auto;
    width: auto;
    float: left;
    text-align: center;
}	

div.img img {
    display: inline;
    margin: 5px;
    border: 1px solid #ffffff;
}

div.img a:hover img {
    border: 1px solid #0000ff;
}

div.desc {
  text-align: center;
  font-weight: normal;
  width: 120px;
  margin: 5px;
}
</style>
</head>
<body>
<?php
include 'MudichurPanchayat/database_connection.php';
         $query=("SELECT FilePath FROM gallery ORDER BY UploadDate DESC LIMIT 5");
  $rs_news = mysql_query($query) or die("Query to get data from gallery table failed: " . mysql_error());
   $gal_result = mysql_query($query) or die('Error, query failed');
 
      
             while ($row = mysql_fetch_assoc($gal_result))
                {
                  foreach ($row as $column) {
                   // echo "<td>$column</td><br>";
					 $filePath = $row['FilePath'];
					// echo $filePath;
					  echo '<img src="./' . $filePath . '" />';;
                 }
                   
      }   
      ?>
	  
<body>
</html>
