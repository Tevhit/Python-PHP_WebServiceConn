<?php

require "connect_to_database.php";

// "$my_condition" became from "connect_to_database.php"
if ($my_condition == "unsuccessful_conn") {
    echo "unsuccessful_operation";
    return;
}

$getCompanyInformation_query = "
                                SELECT CompanyID, CompanyName
                                FROM CompanyInformation;
                            ";

$stmt = $database_connection->prepare($getCompanyInformation_query);
                            
$stmt->execute();

$stmt->store_result();

$contacts = $stmt->bind_result($_CompanyID, $_CompanyName);

$my_data = array();

while($stmt->fetch()){
    
    $temp = [
        'CompanyID'  	=>  $_CompanyID,
        'CompanyName'  	=>  $_CompanyName
    ];
    
    array_push($my_data, $temp);
}

$stmt->free_result();

$stmt->close();

$database_connection->close();

echo json_encode($my_data);

?>