<?php
// Turn off error reporting to prevent any unexpected output

header('Content-Type: application/json');

include "db-connection.php";

$search = isset($_GET['search']) ? $connect->real_escape_string($_GET['search']) : '';

$sql = "SELECT doctor_id, first_name, last_name, specialization FROM doctors
        WHERE first_name LIKE '%$search%' 
        OR last_name LIKE '%$search%' 
        OR specialization LIKE '%$search%'";

$result = $connect->query($sql);

if ($result === false) {
    die(json_encode(['error' => 'Query failed: ' . $connect->error]));
}

$doctors = [];

while ($row = $result->fetch_assoc()) {
    $doctors[] = [
        'doctor_id' => $row['doctor_id'],
        'first_name' => $row['first_name'],
        'last_name' => $row['last_name'],
        'specialization' => $row['specialization']
    ];
}

echo json_encode($doctors);

$connect->close();
?>