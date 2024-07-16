<?php
include 'db-connection.php';
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$description = $_POST['description'];
$date = $_POST['date'];
$type = $_POST['type'];
$doctor_id = $_POST['doctor_id'];
$user_id = $_SESSION['user_id'];

$stmt = $connect->prepare("INSERT INTO medical_record (treatment_type, description, date, user_id, doctor_id) 
                           VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssii", $type, $description, $date, $user_id, $doctor_id);
if ($stmt->execute()) {
  echo "New record created successfully";
  header('Location: user-dashboard.php');
  exit();
} else {
  // Log the error for debugging
  error_log("Error inserting medical record: " . $stmt->error);

  // Provide a generic error message to the user
  echo "An error occurred while creating the record.";
}

$connect->close();
?>