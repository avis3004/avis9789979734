<?php
include 'header.php';
?>
<html>
    <head>
            <link rel="stylesheet" href="dist/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="first.css">
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
setInterval('cycleImages()', 4000);
})
</script>

        <title>
            District profile
        </title>
        <script type="text/javascript" src="basicjs.js">
        </script>   
        <link href="otherlinks.css" rel="stylesheet"type="text/css">
        
    </head>
    <body>
        <aside class="leftbar">
           
   <div id="cycler">
       <img class="active" src="images/kanchipuram images/kailasanathar_temple.jpg"height="300px"width="300px"z-index="+1"  />
       <img src="images/kanchipuram images/bannar1.jpg" height="300px"width="300px" z-index="+1"/>	
       <img src="images/kanchipuram images/bannar2.jpg" height="300px"width="300px" z-index="+1"/>	
       <img src="images/kanchipuram images/bannar3.jpg" height="300px"width="300px"  z-index="+1"/>		
       <img src="images/kanchipuram images/bannar7.jpg" height="300px"width="300px"  z-index="+1"/>		
       <img src="images/kanchipuram images/kanchi-kamakshi-temple-kanchipuram.jpg" height="300px"width="300px"z-index="+1"  />		

</div>
 
       
        </aside>        
        <section class="content">
            <h1>KANCHIPURAM DISTRICT</h1>
          
                    <p>      Kanchipuram district is a district
                        in the northeast of the state of Tamil Nadu in India. It is bounded
                        in the west by Vellore District and Thiruvannamalai District,
                        in the north by Tiruvallur District and Chennai District, 
                        in the south by Viluppuram District and in the east by the Bay of Bengal. 
                        It lies between 11° 00' to 12° 00' latitudes and 77° 28' to 78° 50' longitudes. 
                        The district has a total geographical area of 4,432 km2 (1,711 sq mi)
                        and coastline of 57 km (35 mi). The town of Kanchipuram is the district headquarters.
                        The Chennai International Airport is located in Tirusulam in Kanchipuram district. 
                        Kancheepuram district had a population of 3,998,252 with a sex-ratio of 986 females
                        for every 1,000 males.The district produces over 15,000 engineering graduates every year,
                        same as Gujarat state.</p>
                    <div><center>
                            <img src="images/kanchipuram images/kanchi map.jpg"height="300px"width="300px"></center>
            </div>
                    <h3>GOVERNANCE</h3>
                    <p>
                        Kanchipuram, the temple town, is the district headquarters. For administrative purpose, 
                        the district has been divided into 4 revenue divisions consisting of 12 taluks with 1,214
                        revenue villages. For development purpose, it is divided into 13 development blocks with 
                        648 Village Panchayats.
                    </p>
                    <h3>Revenue Divisions and Taluks</h3>
                    <ul>
                        <li>Tambaram Revenue Division: Alandur taluk, Sholinganallur taluk, Tambaram taluk</li>
                        <li>Chengalpattu Revenue Division: Chengalpattu taluk, Thiruporur taluk, Tirukalukundram taluk</li>
                        <li>Kanchipuram Revenue Division: Sriperumbudur taluk, Walajabad taluk, Kanchipuram taluk</li>
                        <li>Madurantakam Revenue Division: Uthiramerur taluk, Madurantakam taluk, Cheyyur taluk</li>
                    </ul>
                    <p>
                        Alandur, Chengalpattu, Kanchipuram, Sholinganallur, Sriperumbudur and Tambaram taluks 
                        lie within the Chennai Metropolitan Area
                    </p>
                    <h3>ECONOMY</h3>
                    <P>
                        Agriculture is the main occupation of the people with 47% of the population engaged in 
                        it. Paddy is the major crop cultivated in this district. Groundnuts, Sugarcane, Cereals & Millets and 
                        Pulses are the other major crops cultivated. 76.50 Metric Tonnes lands are cultivated in Fuel wood 
                        and 8.039 Tonnes in Cashew. Palar river along with Tanks and wells are the main sources of 
                        irrigation in this district.
                    </P>
                    <P>
                        Kancheepuram is also known as 'Silk City' and 'Temple City', since one of the main professions
                        of the people living in and around is weaving silk sarees. The silk weavers of Kanchi settled more
                        than 400 years ago and have given it an enviable reputation as the producer of the best silk sarees 
                        in the country.
                    </P>
                    <P>
                        More than 70 percent of the 163 notified areas (megalithic sites) in the state of Tamil Nadu
                        are in Kancheepuram district, including those at Kunrathur, Erumaiyur, Nandampakkam, Sirukalathur,
                        Sikarayapuram, Kadaperi, Tiruneermalai, Ayyancheri, Kilambakkam and Nanmangalam.
                    </P>
                    <P>
                      Kanchipuram is also one of the most industrialized districts in the country, thanks to its proximity
                      to the state capital Chennai. Areas surrounding Sriperumbudur have turned out to become one of the 
                      largest manufacturing hubs of India. The district is home to the manufacturing units of Hyundai,
                      Ford, Mitsubishi, Nokia, Samsung, Dell, Saint Gobain, etc. The district is also at the center of the
                      Information Technology boom in India. Many multinational IT companies like Tata Consultancy Services 
                      (TCS), Infosys, Wipro Technologies, Cognizant Technology Solutions, etc. have set up their offices
                      in Kanchipuram district. TCS and Infosys have built huge offices with capacities of 22,000 and 25,000
                      employees, respectively.  
                    </P>
                    <p><a href=""></a></p>
                    <p class='plink' align='right'> <a href="http://www.kanchi.tn.nic.in/">For more information visit this page</a></p>
        </section>
<?php 
        include 'footer.php';
        ?>
    </body>
</html>