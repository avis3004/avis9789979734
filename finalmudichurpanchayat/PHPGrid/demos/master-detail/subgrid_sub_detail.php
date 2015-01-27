<?php 
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 1.5.2
 * @license: see license.txt included in package
 */
 
// include db config
include_once("../../config.php");

// set up DB
mysql_connect(PHPGRID_DBHOST, PHPGRID_DBUSER, PHPGRID_DBPASS);
mysql_select_db(PHPGRID_DBNAME);

// include and create object
include(PHPGRID_LIBPATH."inc/jqgrid_dist.php");

$g = new jqgrid();

// custom data (if passed) need to be filled in URL as query string ($_REQUEST);
//$grid["url"] = "subgrid_detail.php?rowid=".$_REQUEST["rowid"]."&subgrid=".$_REQUEST["subgrid"]."&closed=".$_REQUEST["closed"];

// if no custom param, it is auto set inside lib -- dont need to set
//$grid["url"] = "subgrid_detail.php?rowid=".$_REQUEST["rowid"]."&subgrid=".$_REQUEST["subgrid"];

$grid["sortname"] = 'id'; // by default sort grid by this field
$grid["sortorder"] = "desc"; // ASC or DESC
$grid["height"] = ""; // autofit height of subgrid
$grid["caption"] = "Item Data"; // caption of grid
$grid["autowidth"] = true; // expand grid to screen width
$grid["multiselect"] = true; // allow you to multi-select through checkboxes
$grid["export"] = array("filename"=>"my-file", "sheetname"=>"test"); // export to excel parameters

$g->set_options($grid);

$g->set_actions(array(	
						"add"=>false, // allow/disallow add
						"edit"=>false, // allow/disallow edit
						"delete"=>false, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"export"=>true, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
					) 
				);

$c_id = $_REQUEST["rowid"];

# composite key implementation
$g->select_command = "select concat(id,'-',num) as `key`, i.* FROM invlines i
						WHERE id = $c_id";

// this db table will be used for add,edit,delete
$g->table = "invlines";

// generate grid output, with unique grid name as 'list1'
$out = $g->render("sub2");
echo $out;
?>