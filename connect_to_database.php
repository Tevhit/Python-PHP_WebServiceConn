<?php

// We have to check the authentication
require "check_auth.php";

// "$my_condition" became from "check_auth.php"
if ($my_condition == "unsuccessful_auth") {
    $my_condition = "unsuccessful_conn";
    return;
}
    
$db_name = "tevhitka_DB";
$mysql_username = "tevhitka_tevhitkarsli";
$mysql_password = "my_password*";
$server_name = "00.000.000.000";

$database_connection = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);
if($database_connection)
	$my_condition = "successful_conn";
else
	$my_condition = "unsuccessful_conn";

?>