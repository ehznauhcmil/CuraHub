<?php
include 'db-connection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php"); // Redirect to login page
  exit();
}

$stmt = $connect->prepare("SELECT * FROM medical_record WHERE user_id = ?");
$stmt->bind_param("s", $user_id); // "s" indicates the parameter is a string
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical Records</title>
  <link rel="stylesheet" href="css/style.css">
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
    <h1>Medical Records</h1>
    <table class="visits-table">
      <thead>
        <tr>
          <th>Record ID</th>
          <th>Treatment Type</th>
          <th>Description</th>
          <th>Date</th>
          <th>Doctor ID</th>
          <th>File</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['record_id']; ?></td>
            <td><?php echo $row['treatment_type']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['doctor_id']; ?></td>
            <td><a href="<?php echo $row['file']; ?>" target="_blank">View File</a></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <div class="button-container">
      <button class="profile-button" onclick="location.href='addmedicalreport.php'"
        style="margin-bottom: 10px; margin-top:10px" type="button">Add Medical
        Report</button>
      <button class="profile-button" onclick="location.href='profileM.php'"
        style="margin-bottom: 10px; margin-top:5px">Back to
        Profile</button>

    </div>
  </div>
</body>

</html>
<?php
$connect->close();
?>