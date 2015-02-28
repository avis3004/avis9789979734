<?php
include 'header.php';
include 'MudichurPanchayat/database_connection.php';
?>
<html>
    <head>
        <title>Mudichur panchayat</title>
        <meta charset="UTF-8">
        <link href="basic.css" rel="stylesheet"type="text/css">
        <link href="newcss.css" rel="stylesheet" type="text/css">
		 <link href="otherlinks.css"rel="stylesheet"type="text/css">
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="imagetoolbar" content="no" />
	
   <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

	<!-- sliderman.js -->
	<script type="text/javascript" src="js/sliderman.1.3.8.js"></script>
	<link rel="stylesheet" type="text/css" href="css/sliderman.css" />
	<!-- /sliderman.js -->
        <!--login-->
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
        <!--/login-->
		
		<!--slideshow-->
		
<script type="text/javascript">
function cycleImages(){
      var $active = $('#cycler .active');
      var $next = ($active.next().length > 0) ? $active.next() : $('#cycler img:first');
      $next.css('z-index',2);//move the next image up the pile
      $active.fadeOut(1500,function(){//fade out the top image
	  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
          $next.css('z-index',3).addClass('active');//make the next image the top one
      });
    }

$(document).ready(function(){
// run every 7s
setInterval('cycleImages()', 1000);
})
</script>

<!--slideshow-->
    </head>
    <body>
        
        <section class="slideshow">
            <div id="wrapper">
<div id="cycler">
                    <img class="active" src="img/mudichur images/DSC_1215.jpg" width="700" height="450" z-index="+1" />
					<img src="img/mudichur images/DSC00132.jpg" width="700" height="450" z-index="+1" />
					<img src="img/mudichur images/scan0035.jpg" width="700" height="450" z-index="+1" />
					<img src="img/mudichur images/DSC_0025.jpg" width="700" height="450" z-index="+1" />
     				<img src="img/mudichur images/DSC_0540.jpg" width="700" height="450" z-index="+1" />
                    <img src="img/mudichur images/DSC_0961.jpg" width="700" height="450" z-index="+1"/>
     				<img src="img/mudichur images/DSC_1645.jpg" width="700" height="450" z-index="+1"/>
     				<img src="img/mudichur images/DSC_4269.jpg" width="700" height="450" z-index="+1" />
     				<img src="img/mudichur images/DSC03689.jpg" width="700" height="450" z-index="+1" />
                    <img src="img/mudichur images/scan0052.jpg" width="700" height="450" z-index="+1" />
</div>		
	</div>       
         </section>
       
            
       
            
        <section class="tamilpara">
                <br>
                   <p align="justify">Mudichur is one of the 25 panchayat of St. Thomas Mount, of 
                   Tambaram Taluk.  There are 64 revenue villages in Thambaram
                   Taluk.  Tambaram is one of the ten municipalities of
                   Kancheepuram District.  There are 13 blocks and 648 panchayats
                   in Kanchipuram District.</p><br>
                   <h3>Hi Tech Panchayat</h3><br>
                    <p align="justify">
                        Mudichur Panchayat, one of the two panchayats in Tamil Nadu being
                        provided with a hi band Internet connectivity, computer facility 
                        for video conferencing and representing grievances directly to
                        the highest authorities at the Secretariat at Chennai.
                        The Panchayat accounts are fully computerized.
                    </p>
                  <br>
        </section>
        <aside>
            <div class="sidebar1">
                <div class="bline">
                    <code><h1><center>NEWS</center></h1></code></div>
				<?php
				 $query=("SELECT newsContent FROM newsfeed ORDER BY newsDate DESC LIMIT 15");
  $rs_news = mysql_query($query) or die("Query to get data from news table failed: " . mysql_error());
   
				?>
                <marquee style="font-family: Book Antiqua; color: #000000" bgcolor="#ffffff" direction="up"delay="5"scrollamount="10" onMouseOver="this.stop();"           onmouseout="this.start();">
                    <div class="marqueetext">   
					<?php
					 echo '<table border="0" cellpadding="5">';
   					 while ($row = mysql_fetch_assoc($rs_news))
      				  {
       					 echo '<br><tr>';
        					foreach ($row as $column) {
							
							echo ' <img src="images/newicon.gif" width="35" height="20" alt="new">';
            				echo "<td>$column</td><br>";
       					 }
       						 echo '</tr>';
    	    echo '</table>';
                         
			}		
			?>       
				        </div>
              </marquee>
              </div>
                            </div>
        </aside>
  <?php
        include 'footer.php';
        ?>
    </body>
</html>