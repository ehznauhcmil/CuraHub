<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Medical Report</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1>Add Medical Report</h1>
    <form action="submitMedicalReport.php" method="post" enctype="multipart/form-data">
      <div class="form-row">
        <label for="description"><strong>Description:</strong></label><br />
        <input type="text" id="description" name="description" required>
      </div>
      <div class="form-row">
        <label for="date"><strong>Date:</strong></label><br />
        <input type="date" id="date" name="date" required>
      </div>
      <div class="form-row">
        <label for="type"><strong>Type:</strong></label><br />
        <input type="text" id="type" name="type" required>
      </div>
      <div class="form-row">
        <label for="provider"><strong>Provider:</strong></label><br />
        <input type="text" id="provider" name="provider" required>
      </div>
      <div class="form-row">
        <label for="uploadFile"><strong>Upload File:</strong></label><br />
        <input type="file" id="uploadFile" name="uploadFile" required>
      </div>
      <div class="button-container">
        <button type="submit" class="profile-button">Submit</button>
        <button class="profile-button" onclick="location.href='profileM.php'" type="button">Back to Profile</button>
        <button class="profile-button" onclick="location.href='medicalReport.php'" type="button">Medical Report</button>
        <button class="profile-button" onclick="location.href='profileeditor.php'" type="button">Edit Profile</button>
      </div>
    </form>
  </div>
</body>

</html>