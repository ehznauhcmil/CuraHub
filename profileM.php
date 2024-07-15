<?php
include 'db.php';


$user_id = 1;

$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Management</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <aside class="sidebar">
    <div class="sidebar-navtop">
      <p><a href="homepage.php"><img src="resources/back-icon.png" alt="Go Back to Homepage Icon"></a></p>
      <p><a href="userdashboard.php"><img src="resources/dashboard-icon.png" alt="User Dashboard Icon"></a></p>
      <p><a href="appointment.php"><img src="resources/calendar-icon.png" alt="Appointment Icon"></a></p>
      <p><a href="profilepage.php"><img src="resources/profile-icon.png" alt="Profile Icon"></a></p>
      <p><a href="medication.php"><img src="resources/medication-icon.png" alt="Medication Icon"></a></p>
      <p><a href="medicalreport.php"><img src="resources/medreport-icon.png" alt="Medical Report Icon"></a></p>
      <p><a href="#"><img src="resources/settings-icon.png" alt="Settings Icon"></a></p>
    </div>
    <div class="sidebar-navbottom">
      <p><a href="#"><img src="resources/signout-icon.png" alt="Sign Out Icon"></a></p>
    </div>
  </aside>
  <div class="container">
    <div class="profile-container">
      <img src="2.JPG" alt="Mehrbod Payandeh Profile Photo" class="profile-picture">
      <div>
        <div class="profile-details">
          <h2><?php echo $user['name']; ?></h2>
          <div><?php echo $user['state']; ?></div>
          <br />
          <div class="profile-details-row">
            <div><strong>Gender:</strong> <?php echo $user['gender']; ?></div>
            <div><strong>Birthday:</strong><br /> <?php echo $user['birthday']; ?></div>
            <div><strong>NRIC:</strong> <?php echo $user['nric']; ?></div>
            <div><strong>Address:</strong> <?php echo $user['address']; ?></div>
          </div>
          <div class="profile-details-row">
            <div><strong>Phone Number:</strong> <?php echo $user['phone']; ?></div>
            <div><strong>Email:</strong> <?php echo $user['email']; ?></div>
            <div><strong>State:</strong> <?php echo $user['state']; ?></div>
            <div><strong>Country:</strong> <?php echo $user['country']; ?></div>
          </div>
        </div>
      </div>
      <div class="button-container1">
        <button class="profile-button11" onclick="location.href='profileeditor.php'">Edit Profile</button>
      </div>
    </div>

    <div class="files-payments-container">
      <div class="files-container">
        <h3>File/Documents</h3>
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
        <h3>Payments History</h3>
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
$conn->close();
?>