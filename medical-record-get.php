<?php
include 'db-connection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $connect->prepare("
    SELECT mr.record_id, mr.treatment_type, mr.description, mr.date, CONCAT(d.first_name, ' ', d.last_name) AS doctor_name
    FROM medical_record mr
    JOIN doctors d ON mr.doctor_id = d.doctor_id
    WHERE mr.user_id = ?
");
$stmt->bind_param("i", $user_id); // "i" for integer user_id
$stmt->execute();
$result = $stmt->get_result();

// Fetch results as an array
$records = $result->fetch_all(MYSQLI_ASSOC);
// Return JSON response
header('Content-Type: application/json');
echo json_encode($records);

// Close database connection
$stmt->close();
$connect->close();
?>