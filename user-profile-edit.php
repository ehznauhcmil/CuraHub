<?php
include 'db-connection.php';
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE user_id = $user_id";
// $sql = "SELECT * FROM users WHERE email = $email";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Fetch the user data
  $user = $result->fetch_assoc();
} else {
  echo "No user found.";
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h1>Edit Profile</h1>
    <form action="submitProfile.php" method="post">
      <input type="hidden" name="id" value="<?php echo $user['user_id']; ?>">
      <div class="form-row">
        <label for="name"><strong>First Name:</strong></label><br />
        <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>">
      </div>
      <div class="form-row">
        <label for="name"><strong>Last Name:</strong></label><br />
        <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>">
      </div>
      <div class="form-row">
        <label for="gender"><strong>Gender:</strong></label><br />
        <input type="text" id="gender" name="gender" value="<?php echo $user['gender']; ?>">
      </div>
      <div class="form-row">
        <label for="birthday"><strong>Birthday:</strong></label><br />
        <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $user['date_of_birth']; ?>">
      </div>
      <div class="form-row">
        <label for="nric"><strong>NRIC:</strong></label><br />
        <input type="text" id="identity_no" name="identity_no" value="<?php echo $user['identity_no']; ?>">
      </div>
      <div class="form-row">
        <label for="address"><strong>Address:</strong></label><br />
        <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>">
      </div>
      <div class="form-row">
        <label for="phone"><strong>Phone Number:</strong></label><br />
        <input type="text" id="phone_no" name="phone_no" value="<?php echo $user['phone_no']; ?>">
      </div>
      <div class="form-row">
        <label for="email"><strong>Email:</strong></label><br />
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">
      </div>
      <div class="form-row">
        <label for="state"><strong>State:</strong></label><br />
        <input type="text" id="state" name="state" value="<?php echo $user['state']; ?>">
      </div>
      <div class="form-row">
        <label for="country"><strong>Country:</strong></label><br />
        <input type="text" id="country" name="country" value="<?php echo $user['country']; ?>">
      </div>
      <div class="button-container">
        <button type="submit" class="profile-button">Save Changes</button>
      </div>
    </form>
  </div>
</body>

</html>
<?php
$conn->close();
?>