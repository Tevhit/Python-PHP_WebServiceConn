<?php

require "connect_to_database.php";

// "$my_condition" became from "connect_to_database.php"
if ($my_condition == "unsuccessful_conn") {
    echo "unsuccessful_operation";
    return;
}

// The POST values assigned to variables
$_CompanyID = $_POST["CompanyID"];
$_CompanyName = $_POST["CompanyName"];

$setCompanyName_query = "
                    UPDATE CompanyInformation
                        SET CompanyName = '$_CompanyName'
                        WHERE CompanyID = $_CompanyID
                        ";

$result = mysqli_query($database_connection, $setCompanyName_query);

if($result)
    $my_condition = "successful_operation";
else
    $my_condition = "unsuccessful_operation";
    
$database_connection->close();

echo $my_condition;

?>