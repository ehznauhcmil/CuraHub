<?php
session_start();

require "db-connection.php";
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  echo "User ID is not set in the session. Please log in.";
  exit();
}

$user_id = $_SESSION['user_id'];

// Prepare the SQL query using a prepared statement
$stmt = $connect->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->bind_param("s", $user_id); // Bind the user_id as a string parameter
$stmt->execute();

$result = $stmt->get_result();

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
  <title>Profile Management</title>
  <link rel="stylesheet" href="css/user-profile.css">
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
      <p><a href="medical-record.php"><img src="resources/medreport-icon.png" alt="Medical Report Icon"></a>
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

    <div class="profile-container">

      <div class="profile-main">
        <div>
          <img src="images/2.jpg" alt="Mehrbod Payandeh Profile Photo" class="profile-picture">
        </div>
        <div>
          <h2><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></h2>
          <h3>Subang Jaya, Kuala Lumpur</h3>
        </div>

        <div class="button-container">
          <button class="profile-button" onclick="location.href='user-profile-edit.php'">
            <h3>Edit Profile</h3>
          </button>
          <button class="profile-button" onclick="location.href='medical-record.php'">
            <h3>Medical Records</h3>
          </button>
          <button class="profile-button" onclick="location.href='medical-record-add.php'">
            <h3>Add Medical Record</h3>
          </button>
        </div>
      </div>

      <div class="profile-details">

        <div>
          <h3>Gender:</h3>
        </div>
        <div>
          <h3>Birthday:</h3>
        </div>
        <div>
          <h3>NRIC:</h3>
        </div>
        <div>
          <h3>Address:</h3>
        </div>
        <div>
          <p><?php echo $user['gender']; ?></p>
        </div>
        <div>
          <p><?php echo $user['date_of_birth']; ?></p>
        </div>
        <div>
          <p><?php echo $user['identity_no']; ?></p>
        </div>
        <div>
          <p><?php echo $user['address']; ?></p>
        </div>
        <div>
          <h3>Phone Number:</h3>
        </div>
        <div>
          <h3>Email:</h3>
        </div>
        <div>
          <h3>State:</h3>
        </div>
        <div>
          <h3>Country:</h3>
        </div>
        <div>
          <p><?php echo $user['phone_no']; ?></p>
        </div>
        <div>
          <p><?php echo $user['email']; ?></p>
        </div>
        <div>
          <p><?php echo $user['state']; ?></p>
        </div>
        <div>
          <p><?php echo $user['country']; ?></p>
        </div>

      </div>
    </div>

    <div class="files-payments-container">
      <div class="files-container">
        <h2>File/Documents</h2>
        <label>
          NRIC File:<br />
          <input type="file" name="nric">
        </label>
        <label>
          Birth Certificate:<br />
          <input type="file" name="birth_certificate">
        </label>
        <label>
          Medical Insurance:<br />
          <input type="file" name="medical_insurance">
        </label>
      </div>

      <div class="payments-container">
        <h2>Payments History</h2>
        <table class="payments-table">
          <thead>
            <tr>
              <th>Transaction</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Payment 1: 01/01/2023</td>
              <td>$100</td>
            </tr>
            <tr>
              <td>Payment 2: 02/01/2023</td>
              <td>$150</td>
            </tr>
            <tr>
              <td>Payment 3: 03/01/2023</td>
              <td>$200</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th>Total Amount</th>
              <td>$450</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

  </div>


</body>

</html>
<?php
$connect->close();
?>