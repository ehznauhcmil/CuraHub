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
</head>

<body>
  <div class="container">
    <div class="profile-container">
      <img src="2.JPG" alt="Mehrbod Payandeh Profile Photo" class="profile-picture">
      <div class="profile-details">
        <h2><?php echo $user['name']; ?></h2>
        <div class="profile-details-row">
          <div><strong>Gender:</strong> <?php echo $user['gender']; ?></div>
          <div><strong>Birthday:</strong> <?php echo $user['birthday']; ?></div>
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
      <div class="button-container">
        <button class="profile-button" onclick="location.href='profileeditor.php'">Edit Profile</button>
        <button class="profile-button" onclick="location.href='medicalReport.php'">Medical Report</button>
        <button class="profile-button" onclick="location.href='addmedicalreport.php'">Add Medical Report</button>
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