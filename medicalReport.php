<?php
include 'db.php';

$sql = "SELECT * FROM medical_reports WHERE user_id = 1";  // user_id را به صورت دلخواه قرار دهید
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical Reports</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1>Medical Reports</h1>
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
    <div class="button-container">
      <button class="profile-button" onclick="location.href='profileM.php'">Back to Profile</button>
      <button class="profile-button" onclick="location.href='profileeditor.php'" type="button">Edit Profile</button>
      <button class="profile-button" onclick="location.href='addmedicalreport.php'" type="button">Add Medical
        Report</button>
    </div>
  </div>
</body>

</html>
<?php
$conn->close();
?>