<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Medical Report</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <div class="addheader">
      <h1 class="addheaderh">Cura Hub</h1>
      <div class="addheaderp1">
        <a href="">Medical Report</a>
      </div>
      <div class="addheaderp1">
        <a href="">Upcoming Appointment</a>
      </div>
      <div class="addheaderp1">
        <a href="">You</a>
      </div>
      <div class="BA_div">
        <button class="Browse_doctor1" onclick="location.href='#'" type="button">Browse doctor</button>
        <button class="Browse_doctor" onclick="location.href='#'" type="button">Switch to Admin</button>

      </div>

    </div>
  </header>
  <div class="container">
    <h1>Add Medical Report</h1>
    <form action="submitMedicalReport.php" method="post" enctype="multipart/form-data">
      <div class="form-row">
        <label for="description"><strong>Description:</strong></label><br />
        <input type="text" id="description" name="description" required placeholder="Type something here">
      </div>
      <div class="form-row">
        <label for="date"><strong>Date:</strong></label><br />
        <input type="date" id="date" name="date" required placeholder="Date">
      </div>
      <div class="form-row">
        <label for="type"><strong>Type:</strong></label><br />
        <input type="text" id="type" name="type" required placeholder="Type something here">
      </div>
      <div class="form-row">
        <label for="provider"><strong>Doctor ID:</strong></label><br />
        <input type="number" id="provider" name="provider" required placeholder="Provider">
      </div>
      <div class="form-row">
        <label for="uploadFile"><strong>Upload File:</strong></label><br />
        <input type="file" id="uploadFile" name="uploadFile" required>
      </div>
      <div class="button-container">
        <button type="submit" class="profile-button">Submit</button>
        <!-- <button class="profile-button" onclick="location.href='profileM.php'" type="button">Back to Profile</button>
        <button class="profile-button" onclick="location.href='medicalReport.php'" type="button">Medical Report</button>
        <button class="profile-button" onclick="location.href='profileeditor.php'" type="button">Edit Profile</button> -->
      </div>
    </form>
  </div>
</body>

</html>