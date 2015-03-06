<?php  
// include db config 
include_once("config.php");

// set up DB 
mysql_connect('localhost','root','');
mysql_select_db(PHPGRID_DBNAME); 

// include and create object 
include(PHPGRID_LIBPATH."inc/jqgrid_dist.php"); 

// you can customize your own columns ... 
$col = array(); 
$col["title"] = "ComplaintRefNo"; 
$col["name"] = "ComplaintRefId"; 
$col["width"] = "5"; 
$col["editable"] = true; // this column is not editable 
$cols[] = $col; 

$col = array(); 
$col["title"] = "ComplaintType"; 
$col["name"] = "ComplaintType"; 
$col["width"] = "5"; 
$col["editable"] = true; // this column is not editable 
$cols[] = $col;

$col = array(); 
$col["title"] = "WardNo"; 
$col["name"] = "WardNumber"; 
$col["width"] = "5"; 
$col["editable"] = true; // this column is not editable 
$cols[] = $col; 


$col = array(); 
$col["title"] = "StreetName"; 
$col["name"] = "StreetName"; 
$col["width"] = "8"; 
$col["editable"] = true; // this column is not editable 

$cols[] = $col; 
$col = array(); 
$col["title"] = "Complaint Description"; 
$col["name"] = "ComplaintDesc"; 
$col["width"] = "10"; 
$col["editable"] = true; // this column is not editable 
$cols[] = $col; 

$col = array(); 
$col["title"] = "ComplaintStatus"; // caption of column 
$col["name"] = "ComplaintStatus"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["width"] = "8";
$col["editable"] = true;
$col["edittype"] = "select";
$col["editoptions"] = array("value"=>'Completed:Completed;Inprogress:Inprogress;New:New;');
$cols[] = $col;         


$g = new jqgrid(); 

$grid["rowNum"] = 20; // by default 20 
$grid["caption"] = "Mudichur Panchayat Online Complaints Admin View"; // caption of grid 
$grid["autowidth"] = true; // expand grid to screen width 
$grid["export"] = array("format"=>"pdf", "filename"=>"my-file", "sheetname"=>"test"); 

$g->set_options($grid); 

$g->set_actions(array(     
                        "add"=>true, // allow/disallow add 
                        "edit"=>true, // allow/disallow edit 
                        "delete"=>true, // allow/disallow delete 
                        //"save"=>true,
                        "rowactions"=>true, // show/hide row wise edit/del/save option 
                        "export"=>true, // show/hide export to excel option 
                        "autofilter" => true, // show/hide autofilter for search 
                        "search" => "advance" // show single/multi field search condition (e.g. simple or advance) 
                    )  
                ); 

$g->table = "complaints"; 

$g->set_columns($cols,true); 
$out = $g->render("list1"); 
if(isset( $_SESSION["usertype"])) {

 if( $_SESSION["usertype"] == "Admin") { 

?> 
<?php
include 'header.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html> 
<head> 
    <link rel="stylesheet" type="text/css" media="screen" href="/avis9789979734/finalmudichurpanchayat/lib/js/themes/redmond/jquery-ui.custom.css"></link>     
    <link rel="stylesheet" type="text/css" media="screen" href="/avis9789979734/finalmudichurpanchayat/lib/js/jqgrid/css/ui.jqgrid.css"></link>     
    <link rel="stylesheet" type="text/css" href="otherlinks.css" />
    <script src="/avis9789979734/finalmudichurpanchayat/lib/js/jquery.min.js" type="text/javascript"></script> 
    <script src="/avis9789979734/finalmudichurpanchayat/lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script> 
    <script src="/avis9789979734/finalmudichurpanchayat/lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>     
    <script src="/avis9789979734/finalmudichurpanchayat/lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script> 
</he
</head> 
<body> 
    <div style="margin:10px"> 
   
    <br> 
    <br> 
    <?php echo $out?> 
    </div> 
     <?php
include 'footer.php';
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
