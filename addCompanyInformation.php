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
$_CompanyNote = $_POST["CompanyNote"];

$addCompanyInformation_query = "
                                INSERT INTO CompanyInformation(CompanyID, CompanyName, CompanyNote) 
                                VALUES($_CompanyID, '$_CompanyName', '$_CompanyNote')
                            ";

$result = mysqli_query($database_connection, $addCompanyInformation_query);

if($result)
    $my_condition = "successful_operation";
else
    $my_condition = "unsuccessful_operation";
    
$database_connection->close();

echo $my_condition;

?>