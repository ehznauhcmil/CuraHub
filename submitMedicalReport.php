<?php
include 'db.php';

$description = $_POST['description'];
$date = $_POST['date'];
$type = $_POST['type'];
$provider = $_POST['provider'];
$uploadFile = $_FILES['uploadFile'];


$target_dir = "uploads/";
$target_file = $target_dir . basename($uploadFile["name"]);
move_uploaded_file($uploadFile["tmp_name"], $target_file);

$sql = "INSERT INTO medical_reports (user_id, description, date, type, provider, file_path)
VALUES (1, '$description', '$date', '$type', '$provider', '$target_file')";  // user_id را به صورت دلخواه قرار دهید

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical Report Submitted</title>
  <link rel="stylesheet" href="style.css">
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