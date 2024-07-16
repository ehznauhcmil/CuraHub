<?php

include 'db-connection.php';
session_start();

$user_id = $_SESSION['user_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$date_of_birth = $_POST['date_of_birth'];
$identity_no = $_POST['identity_no'];
$address = $_POST['address'];
$phone_no = $_POST['phone_no'];
$email = $_POST['email'];
$state = $_POST['state'];
$country = $_POST['country'];

// Prepare the SQL statement with placeholders
$sql = "UPDATE users SET 
        first_name=?, last_name=?, gender=?, date_of_birth=?, identity_no=?, 
        address=?, phone_no=?, email=?, state=?, country=? 
        WHERE user_id=?";

// Initialize a statement and prepare the SQL query
$stmt = $connect->prepare($sql);

// Bind the parameters to the SQL query
$stmt->bind_param("ssssssssssi", 
    $first_name, $last_name, $gender, $date_of_birth, $identity_no, 
    $address, $phone_no, $email, $state, $country, $user_id);

// Execute the statement
if ($stmt->execute()) {
    echo "User updated successfully.";
} else {
    echo "Error updating user: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$connect->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Updated</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h1>Profile Updated</h1>
    <p>Your profile has been updated successfully.</p>
    <button class="profile-button" onclick="location.href='profileM.php'">Back to Profile</button>
  </div>
</body>

</html>