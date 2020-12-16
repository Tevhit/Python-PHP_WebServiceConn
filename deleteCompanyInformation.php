<?php

require "connect_to_database.php";

// "$my_condition" became from "connect_to_database.php"
if ($my_condition == "unsuccessful_conn") {
    echo "unsuccessful_operation";
    return;
}

// The POST value assigned to variable
$_CompanyID = $_POST["CompanyID"];

$deleteCompanyInformation_query = "
                    DELETE FROM CompanyInformation
                        WHERE CompanyID = $_CompanyID
                        ";
$result = mysqli_query($database_connection, $deleteCompanyInformation_query);

if($result)
    $my_condition = "successful_operation";
else
    $my_condition = "unsuccessful_operation";

$database_connection->close();

echo $my_condition;

?>