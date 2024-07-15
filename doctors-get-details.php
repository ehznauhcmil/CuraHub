<?php
// Database connection (replace with your credentials)
require "connection.php";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch provider data with facility and availability
$sql = "SELECT provider.*, facility.facility_name, facility.address, availability.date, availability.start_time, availability.end_time
        FROM provider
        JOIN facility ON provider.facility_id = facility.facility_id
        JOIN availability ON provider.provider_id = availability.provider_id
        WHERE availability.status ='0'";

$result = $conn->query($sql);

// Store data in an array
$providers = array();
while ($row = $result->fetch_assoc()) {
    $providers[] = $row;
}

// Output JSON
header('Content-Type: application/json');
echo json_encode($providers);

$connect->close();
?>