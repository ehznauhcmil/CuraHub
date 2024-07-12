<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$nric = $_POST['nric'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$state = $_POST['state'];
$country = $_POST['country'];

$sql = "UPDATE users SET 
        name='$name', gender='$gender', birthday='$birthday', nric='$nric', 
        address='$address', phone='$phone', email='$email', state='$state', country='$country' 
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Updated</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1>Profile Updated</h1>
    <p>Your profile has been updated successfully.</p>
    <button class="profile-button" onclick="location.href='profileM.php'">Back to Profile</button>
  </div>
</body>

</html>