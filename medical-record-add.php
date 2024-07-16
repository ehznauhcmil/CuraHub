<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Medical Report</title>
  <link rel="stylesheet" href="css/medical-record-add.css">
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
    <h1>Add Medical Records</h1>
    <form action="medical-record-submit.php" method="post" enctype="multipart/form-data">
      <div class="form-fields">
        <div>
          <label for="description">
            <h3>Description:</h3>
          </label>
        </div>

        <div>
          <input type="text" id="description" name="description" required placeholder="Type something here">
        </div>

        <div>
          <label for="date">
            <h3>Date:</h3>
          </label>
        </div>

        <div>
          <input type="date" id="date" name="date" required placeholder="Date">
        </div>

        <div>
          <label for="type">
            <h3>Treatment Type:</h3>
          </label>
        </div>

        <div>
          <input type="text" id="type" name="type" required placeholder="Type something here">
        </div>

        <div>
          <label for="doctorId">
            <h3>Doctor ID:</h3>
          </label>
        </div>

        <div>
          <input type="number" id="doctor_id" name="doctor_id" required placeholder="Doctor ID">
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
      </div>
    </form>
  </div>
</body>

</html>