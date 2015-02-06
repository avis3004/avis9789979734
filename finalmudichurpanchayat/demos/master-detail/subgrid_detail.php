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

// passed from parent grid
$c_id = $_REQUEST["rowid"];
if (empty($c_id)) $c_id = 0;

// you can customize your own columns ...

$col = array();
$col["title"] = "Id"; // caption of column
$col["name"] = "id"; // field name, must be exactly same as with SQL prefix or db field
$col["width"] = "10";
$cols[] = $col;	

$col = array();
$col["title"] = "Client Id";
$col["name"] = "client_id";
$col["width"] = "10";
$col["editable"] = true;
$col["hidden"] = true;
$col["editoptions"] = array("defaultValue" => $c_id); // set default value
$cols[] = $col;		

$col = array();
$col["title"] = "Date";
$col["name"] = "invdate";
$col["width"] = "50";
$col["editable"] = true; // this column is editable
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;
		
$col = array();
$col["title"] = "Client";
$col["name"] = "name";
$col["width"] = "100";
$col["editable"] = false; // this column is not editable
$cols[] = $col;

$col = array();
$col["title"] = "Note";
$col["name"] = "note";
$col["width"] = "100"; // not specifying width will expand to fill space
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["editable"] = true;
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes
$cols[] = $col;

$col = array();
$col["title"] = "Total";
$col["name"] = "total";
$col["width"] = "50";
$col["editable"] = true;
$cols[] = $col;

$col = array();
$col["title"] = "Closed";
$col["name"] = "closed";
$col["width"] = "50";
$col["editable"] = true;
$col["edittype"] = "checkbox"; // render as checkbox
$col["editoptions"] = array("value"=>"Yes:No"); // with these values "checked_value:unchecked_value"
$cols[] = $col;

// custom data (if passed) need to be filled in URL as query string ($_REQUEST);
//$grid["url"] = "subgrid_detail.php?rowid=".$_REQUEST["rowid"]."&subgrid=".$_REQUEST["subgrid"]."&gender=".$_REQUEST["gender"];

// if no custom param, it is auto set inside lib -- dont need to set
//$grid["url"] = "subgrid_detail.php?rowid=".$_REQUEST["rowid"]."&subgrid=".$_REQUEST["subgrid"];

$grid["sortname"] = 'id'; // by default sort grid by this field
$grid["sortorder"] = "desc"; // ASC or DESC
$grid["height"] = ""; // autofit height of subgrid
$grid["caption"] = "Invoice Data"; // caption of grid
$grid["autowidth"] = true; // expand grid to screen width
$grid["multiselect"] = true; // allow you to multi-select through checkboxes
$grid["export"] = array("filename"=>"my-file", "sheetname"=>"test"); // export to excel parameters
$grid["subGrid"] = true;
$grid["subgridurl"] = "subgrid_sub_detail.php";
// $grid["subgridparams"] = "closed"; // extra data for sub grid

// $grid["cellEdit"] = true;
// to refresh parent after subgrid edit
// $grid["afterSubmitCell"] = "function(serverresponse, rowid, cellname, value, iRow, iCol) { jQuery('#list1').trigger('reloadGrid',[{jqgrid_page:1}]); return [true, '']; }";

$g->set_options($grid);

$g->set_actions(array(	
						"add"=>true, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"export"=>true, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
					) 
				);

// you can provide custom SQL query to display data
$g->select_command = "select i.id, i.client_id, i.invdate, c.name,
						i.note, i.total, i.closed FROM invheader i
						INNER JOIN clients c ON c.client_id = i.client_id
						WHERE c.client_id = $c_id";

// this db table will be used for add,edit,delete
$g->table = "invheader";

// pass the cooked columns to grid
$g->set_columns($cols);
// group columns header
$g->set_group_header( array(
   "useColSpanStyle"=>true,
   "groupHeaders"=>array(
       array(
           "startColumnName"=>'invdate', // group starts from this column
           "numberOfColumns"=>2, // group span to next 2 columns
           "titleText"=>'Company Details' // caption of group header
       )
   )
)
);

// generate grid output, with unique grid name as 'list1'
$out = $g->render("sub1");
echo $out;
?>
<script>
	jQuery(document).ready(function(){
		jQuery('#<?php echo $g->id?>').jqGrid('navButtonAdd', '#<?php echo $g->id?>_pager', 
		{
			'caption'      : 'Custom Button', 
			'buttonicon'   : 'ui-icon-pencil', 
			'onClickButton': function()
			{
				// your custom JS code ...
				window.open("http://google.com");
			},
			'position': 'last'
		});
	});
</script>
