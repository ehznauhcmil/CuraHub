<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/doctors-booking.css">
    <title>Doctor Selection</title>

</head>

<?php
session_start();
?>

<body>
    <div id="user-data" data-user-id="<?php echo htmlspecialchars($_SESSION['user_id']); ?>" display="hidden"></div>

    <aside class="sidebar">
        <div class="sidebar-navtop">
            <p><a href="home-screen.php"><img src="resources/home.png" alt="Go Back to Homepage Icon"></a></p>
            <p><a href="user-dashboard.php"><img src="resources/dashboard-icon.png" alt="User Dashboard Icon"></a></p>
            <p><a href="doctors-booking.php"><img src="resources/calendar-icon.png" alt="Appointment Icon"></a></p>
            <p><a href="user-profile.php"><img src="resources/profile-icon.png" alt="Profile Icon"></a></p>
            <p><a href="medication.php"><img src="resources/medication-icon.png" alt="Medication Icon"></a></p>
            <p><a href="medical-report.php"><img src="resources/medreport-icon.png" alt="Medical Report Icon"></a>
            </p>
            <p><a href="#"><img src="resources/settings-icon.png" alt="Settings Icon"></a></p>
        </div>
        <div class="sidebar-navbottom">
            <p><a href="logout.php"><img src="resources/signout-icon.png" alt="Log Out Icon"></a></p>
        </div>
    </aside>
    <div class="main">

        <div class="doctor-selection">
            <div class="spacer"></div>
            <h2>Search for a doctor in our partner facilities</h2>
            <div class="spacer"></div>
            <input type="text" id="search" placeholder="Search doctors...">

            <div id="doctors-list">

            </div>
        </div>
        <div id="doctor-details">
            <p id="choose-doctor">Choose a doctor to proceed</p>
            <div id="details-content" style="display: none;"></div>
            <div id="appointment-booking" style="display: none;">
                <h2>Book Appointment</h2>
                <div class="spacer"></div>
                <input type="date" id="appointment-date">
                <div id="time-slots"></div>
                <button id="submit-appointment" style="display: none;">Book Appointment</button>
            </div>
        </div>
    </div>
</body>

<footer>
    <script src="js/doctors-booking.js"></script>
</footer>

</html>