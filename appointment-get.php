<?php
session_start();
include "db-connection.php";

$userId = $_SESSION['user_id'];

$query = "SELECT a.*, d.first_name, d.last_name, d.specialization, h.hospital_name AS hospital_name, s.start_time AS start_time, s.end_time AS end_time
          FROM appointments a
          JOIN slots s on a.slot_id = s.slot_id
          JOIN doctors d ON a.doctor_id = d.doctor_id
          JOIN hospitals h ON h.hospital_id = d.hospital_id 
          WHERE a.user_id = '$userId'";

$result = mysqli_query($connect, $query); // Execute the query

if (!$result) {
    die("Query failed: " . mysqli_error($connect));
}

$appointments = []; // Initialize an empty array to store results

// Fetch the results as an associative array
while ($row = mysqli_fetch_assoc($result)) {
    $appointments[] = $row;
}

// Return appointments as JSON
echo json_encode($appointments);
