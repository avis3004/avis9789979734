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
		 <link href="otherlinks.css"rel="stylesheet"type="text/css"">
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
    </head>
    <body>
        
        <section class="slideshow">
            <div id="wrapper">

		<div id="examples_outer">

			<div id="slider_container_2">

				<div id="SliderName_2" class="SliderName_2">
					<img src="img/mudichur images/DSC_1215.jpg" width="700" height="450" alt="Demo2 first" title="Demo2 first" />
					<img src="img/mudichur images/DSC00132.jpg" width="700" height="450" alt="Demo2 second" title="Demo2 second" />
					<img src="img/mudichur images/scan0035.jpg" width="700" height="450" alt="Demo2 third" title="Demo2 third" />
					<img src="img/mudichur images/DSC_0025.jpg" width="700" height="450" alt="Demo2 fourth" title="Demo2 fourth" />
     				<img src="img/mudichur images/DSC_0540.jpg" width="700" height="450" alt="Demo2 fifth" title="Demo2.fifth" />
                    <img src="img/mudichur images/DSC_0961.jpg" width="700" height="450" alt="Demo2 sixth" title="Demo2.sixth" />
     				<img src="img/mudichur images/DSC_1645.jpg" width="700" height="450" alt="Demo2 seventh" title="Demo2.seventh" />
     				<img src="img/mudichur images/DSC_4269.jpg" width="700" height="450" alt="Demo2 eight" title="Demo2.eight" />
     				<img src="img/mudichur images/DSC03689.jpg" width="700" height="450" alt="Demo2 nineth" title="Demo2.nineth" />
                   <img src="img/mudichur images/scan0052.jpg" width="700" height="450" alt="Demo2 tenth" title="Demo2.tenth" />

                                </div>
				<div class="c"></div>
				<div id="SliderNameNavigation_2"></div>
				<div class="c"></div>

				<script type="text/javascript">
					effectsDemo2 = 'rain,stairs,fade,rain,stairs,fade,rain,stairs,fade';
					var demoSlider_2 = Sliderman.slider({container: 'SliderName_2', width: 700, height: 450, effects: effectsDemo2,
						display: {
							autoplay: 3000,
							loading: {background: '#000000', opacity: 0.5, image: 'img/loading.gif'},
							buttons: {hide: true, opacity: 1, prev: {className: 'SliderNamePrev_2', label: ''}, next: {className: 'SliderNameNext_2', label: ''}},
							description: {hide: true, background: '#000000', opacity: 0.4, height: 50, position: 'bottom'},
							navigation: {container: 'SliderNameNavigation_2', label: '<img src="img/clear.gif" />'}
						}
					});
				</script>

				
			</div>
			
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
                <marquee style="font-family: Book Antiqua; color: #000000" bgcolor="#ffffff" direction="up"delay="10"scrollamount="5" onMouseOver="this.stop();"           onmouseout="this.start();">
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
        </aside>
  <?php
        include 'footer.php';
        ?>
    </body>
</html>