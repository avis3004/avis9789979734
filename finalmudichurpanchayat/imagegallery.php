<?php
include 'header.php';
?>
<html>
       <head>
            <title> Gallery</title>
                <link href="otherlinks.css" rel="stylesheet"type="text/css">
           </head>
    <body>
	<section class="image">
	    <div class="imghd">
		<h1>IMAGE GALLERY</h1></div>
		 <h2>Images on scheme 1</h2>
		
		 
	<?php
include 'MudichurPanchayat/database_connection.php';
         $query=("SELECT FilePath FROM gallery ORDER BY UploadDate DESC LIMIT 25");
  $rs_news = mysql_query($query) or die("Query to get data from gallery table failed: " . mysql_error());
   $gal_result = mysql_query($query) or die('Error, query failed');
 
     
             while ($row = mysql_fetch_assoc($gal_result))
                {
				
				 echo ' <div class="image-zoom-container">;';
				  
                 //echo '<br>';
                  foreach ($row as $column) {
			     
				  echo '<div class="zoom-container">';
		          echo '<a href="#">';
				 
                   // echo "<td>$column</td><br>";
					 $filePath = $row['FilePath'];
					// echo $filePath;
					  echo '<img src="./' . $filePath . '" />';
                 }
				
             echo '</a>';
			  echo '</div>';      
      }   
      ?>
	
          </section>         
<?php 
        include 'footer.php';
        ?>
    </body>
</html>

