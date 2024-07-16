<!DOCTYPE html>
<html>

<head>
  <title>Medical Records</title>
  <link rel="stylesheet" href="css/medical-record.css">
  <link rel="stylesheet" href="css/navbar.css">
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
    <table class="visits-table" id="medicalRecordsTable">
      <thead>
        <tr>
          <th>Record ID</th>
          <th>Treatment Type</th>
          <th>Description</th>
          <th>Date</th>
          <th>Doctor Name</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <div class="button-container">
      <button class="profile-button" onclick="location.href='medical-record-add.php'">
        <h3>Add Medical Report</h3>
      </button>
      <button class="profile-button" onclick="location.href='user-profile.php'">
        <h3>Back to Profile</h3>
      </button>
    </div>

  </div>

  <script src="js/medical-record.js">

  </script>

</body>

</html>