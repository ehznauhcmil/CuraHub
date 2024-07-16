<?php
include 'db-connection.php';
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$description = $_POST['description'];
$date = $_POST['date'];
$type = $_POST['type'];
$doctor_id = $_POST['provider'];
$uploadFile = $_FILES['uploadFile'];
$user_id = $_SESSION['user_id'];


// $target_dir = "uploads/";
// $target_file = $target_dir . basename($uploadFile["name"]);
// move_uploaded_file($uploadFile["tmp_name"], $target_file);

$sql = "INSERT INTO medical_record (user_id, treatment_type, description, date, doctor_id, file)
  VALUES ('$user_id', '$type', '$description', '$date', '$doctor_id', 'something')";  // user_id را به صورت دلخواه قرار دهید

if ($connect->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical Report Submitted</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h1>Medical Report Submitted</h1>
    <p>Your medical report has been uploaded successfully.</p>
    <button class="profile-button" onclick="location.href='medicalReport.php'">View Medical Reports</button>
    <button class="profile-button" onclick="location.href='profileM.php'">Back to Profile</button>
  </div>
</body>

</html>