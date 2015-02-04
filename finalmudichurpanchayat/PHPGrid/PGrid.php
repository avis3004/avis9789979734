
<?php 

session_start();

ini_set("error_reporting", E_ALL & ~E_DEPRECATED);

// include db config 
include_once("/config.php"); 

// set up DB 
mysql_connect('localhost','root','');

mysql_select_db(PHPGRID_DBNAME); 

// include and create object 
include(PHPGRID_LIBPATH."inc/jqgrid_dist.php"); 
$g = new jqgrid(); 

// set few params 
$grid["caption"] = "Mudichur Panchayat Admin Complaints View"; 
$g->set_options($grid); 

// set database table for CRUD operations 
$g->table = "complaints"; 

// render grid 
$out = $g->render("list1"); 

if(isset( $_SESSION["usertype"])) {

 if( $_SESSION["usertype"] == "Admin") { 

?> 
<?php
include '../header.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html> 
<head> 
    <link rel="stylesheet" type="text/css" media="screen" href="/avis9789979734/finalmudichurpanchayat/PHPGrid/lib/js/themes/redmond/jquery-ui.custom.css"></link>     
    <link rel="stylesheet" type="text/css" media="screen" href="/avis9789979734/finalmudichurpanchayat/PHPGrid/lib/js/jqgrid/css/ui.jqgrid.css"></link>     
    <link rel="stylesheet" type="text/css" href="../otherlinks.css" />
    <script src="/avis9789979734/finalmudichurpanchayat/PHPGrid/lib/js/jquery.min.js" type="text/javascript"></script> 
    <script src="/avis9789979734/finalmudichurpanchayat/PHPGrid/lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script> 
    <script src="/avis9789979734/finalmudichurpanchayat/PHPGrid/lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>     
    <script src="/avis9789979734/finalmudichurpanchayat/PHPGrid/lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script> 
</head> 
<body> 
<section>
    <div style="margin:10px"> 
    <?php echo $out?> 
    </div> 
	</section>
	 <?php
include '../footer.php';
?>
</body> 
</html> 

 <?php }
   else { 

               echo  "Error - you should have admin access to this page";
              
   } 

   } else { 

               echo  "Error - you dont have access to this page";
              
   } ?>  
  