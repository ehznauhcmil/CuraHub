<?php
include 'db.php';

$sql = "SELECT * FROM medical_reports WHERE user_id = 1";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical Reports</title>
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
    <h1>Previous Health Checkups</h1>
    <div class="button-container" style="display:flex; justify-content:end;">
      <button class="profile-button" onclick="location.href='addmedicalreport.php'"
        style="margin-bottom: 10px; margin-top:10px" type="button">Add Medical
        Report</button>


    </div>
    <table class="visits-table">
      <thead>
        <tr>
          <th>Description</th>
          <th>Date</th>
          <th>Type</th>
          <th>Provider</th>
          <th>File</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['provider']; ?></td>
            <td><a href="<?php echo $row['file_path']; ?>" target="_blank">View File</a></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

  </div>
</body>

</html>
<?php
$conn->close();
?>