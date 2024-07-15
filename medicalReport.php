<?php
include 'db.php';
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM medical_record WHERE user_id = $user_id"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical Reports</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h1>Medical Reports</h1>
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
$conn->close();
?>