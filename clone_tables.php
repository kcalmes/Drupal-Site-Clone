<?php
/*
 *
 *
 *
 *
 */
//define
define("MYSQL_USER", "ccc");
define("MYSQL_DB", "drupal");
define("MYSQL_PASSWORD", "******");
define("MYSQL_HOST", "localhost");

if(!isset($argv[1]) || !isset($argv[2]) || !isset($argv[3])){
	print "Error - Incorrect arguments, usage example: \nphp copy_drupal_tables current_prefix new_prefix remove_old_tables_after_copy_bool\n";
	exit(0);
}

$prefix = $argv[1];
$new_prefix = $argv[2];
$remove_old_tables = $argv[3];

//log into mysql and get the list of databases
$conn = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or die(mysqlerrno().': ' .mysql_error); //database connect
mysql_select_db (MYSQL_DB);
$tables = array();
$tables_resource = mysql_query("SHOW TABLES");
while($row = mysql_fetch_array($tables_resource)){
	if(strpos($row[0], $prefix) === 0){
		$tables[] = $row[0];
	}
}
foreach($tables as $table){
	$new_table = $new_prefix.substr($table, strpos($table, "_")+1);
	mysql_query("CREATE TABLE $new_table LIKE $table") or die('Invalid query: ' . mysql_error());
	mysql_query("INSERT INTO $new_table SELECT * FROM $table") or die('Invalid query: ' . mysql_error());
	if($remove_old_tables){
		mysql_query("DROP TABLE $table") or die ('Invalid query: ' . mysql_error());
	}
}
mysql_close($conn);
?>
