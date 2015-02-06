<?php
// PHP Grid database connection settings
define("PHPGRID_DBTYPE","{{dbtype}}"); // or mysqli
define("PHPGRID_DBHOST","{{dbhost}}");
define("PHPGRID_DBUSER","{{dbuser}}");
define("PHPGRID_DBPASS","{{dbpass}}");
define("PHPGRID_DBNAME","{{dbname}}");

// Automatically make db connection inside lib
define("PHPGRID_AUTOCONNECT",0);

// Basepath for lib
define("PHPGRID_LIBPATH",dirname(__FILE__).DIRECTORY_SEPARATOR."lib".DIRECTORY_SEPARATOR);
