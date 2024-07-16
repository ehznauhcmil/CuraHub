<?php
include 'db-connection.php';
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE user_id = $user_id";
$result = $connect->query($sql);

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
  <link rel="stylesheet" href="css/user-profile-edit.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

  <aside class="sidebar">
    <div class="sidebar-img-container">
      <p><a href="home-screen.php"><img src="resources/home.png" alt="Go Back to Homepage Icon"></a></p>
    </div>
    <div class="sidebar-img-container">
      <p><a href="user-dashboard.php"><img src="resources/dashboard-icon.png" alt="User Dashboard Icon"></a>
      </p>
    </div>
    <div class="sidebar-img-container">
      <p><a href="doctors-booking.php"><img src="resources/calendar-icon.png" alt="Appointment Icon"></a></p>
    </div>
    <div class="sidebar-img-container">
      <p><a href="user-profile.php"><img src="resources/profile-icon.png" alt="Profile Icon"></a></p>
    </div>
    <div class="sidebar-img-container">
      <p><a href="medication.php"><img src="resources/medication-icon.png" alt="Medication Icon"></a></p>
    </div>
    <div class="sidebar-img-container">
      <p><a href="medical-report.php"><img src="resources/medreport-icon.png" alt="Medical Report Icon"></a>
      </p>
    </div>
    <div class="sidebar-img-container">
      <p><a href="#"><img src="resources/settings-icon.png" alt="Settings Icon"></a></p>
    </div>
    <div class="sidebar-img-container">
      <p><a href="logout.php"><img src="resources/signout-icon.png" alt="Log Out Icon"></a></p>
    </div>

  </aside>

  <div class="container">
    <h1>Edit Profile</h1>
    <form action="user-profile-submit.php" method="post">
      <input type="hidden" name="id" value="<?php echo $user['user_id']; ?>">
      <div class="form-fields">
        <div>
          <label for="name">
            <h3>First Name:</h3>
          </label>
        </div>
        <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>">
        <div>
          <label for="name">
            <h3>Last Name:</h3>
          </label>

        </div>

        <div>
          <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>">
        </div>

        <div>
          <label for="gender">
            <h3>Gender:</h3>
          </label>
        </div>

        <div>
          <input type="text" id="gender" name="gender" value="<?php echo $user['gender']; ?>">
        </div>

        <div>
          <label for="birthday">
            <h3>Birthday:</h3>
          </label>
        </div>

        <div>
          <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $user['date_of_birth']; ?>">
        </div>

        <div>
          <label for="nric">
            <h3>NRIC:</h3>
          </label>
        </div>

        <div>
          <input type="text" id="identity_no" name="identity_no" value="<?php echo $user['identity_no']; ?>">
        </div>

        <div>
          <label for="address">
            <h3>Address:</h3>
          </label>
        </div>

        <div>
          <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>">
        </div>

        <div>
          <label for="phone">
            <h3>Phone Number:</h3>
          </label>
        </div>

        <div>
          <input type="text" id="phone_no" name="phone_no" value="<?php echo $user['phone_no']; ?>">
        </div>

        <div>
          <label for="email">
            <h3>Email:</h3>
          </label>
        </div>

        <div>
          <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">
        </div>

        <div>
          <label for="state">
            <h3>State:</h3>
          </label>
        </div>

        <div>
          <input type="text" id="state" name="state" value="<?php echo $user['state']; ?>">
        </div>

        <div>
          <label for="country">
            <h3>Country:</h3>
          </label>
        </div>

        <div>
          <input type="text" id="country" name="country" value="<?php echo $user['country']; ?>">
        </div>




      </div>
      <div class="spacer"></div>
      <div class="button-container">
        <button type="submit" class="profile-button">
          <h3>Submit</h3>
        </button>
        <button class="profile-button" onclick="window.location.href='user-profile.php'">
          <h3>Back to Profile</h3>
        </button>
    </form>
  </div>
</body>

</html>
<?php
$connect->close();
?>