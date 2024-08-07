<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'User';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/user-dashboard.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>

<body>
    <div id="user-data" data-user-id="<?php echo htmlspecialchars($_SESSION['user_id']); ?>" display="hidden"></div>
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


    <main>
        <div class="user-greetings-container">
            <h2>Hi, <?php echo htmlspecialchars($username); ?></h2>
            <h1>Welcome Back!</h1>
        </div>
        <div class="checkup-reminder-container">
            <div class="checkup-reminder-left">
                <h4>Reminder</h4>
                <h1>Have You Had a Routine Health Check this Month?</h1>
                <p>Book your routine health check now!</p>
                <div class="checkup-reminder-button">
                    <button class="check-now-button" onclick="window.location.href='doctors-booking.php'">Check
                        Now</button>
                    <button class="view-report-button" onclick="window.location.href='medical-record.php'">View
                        Report</button>
                </div>
            </div>
            <div class="checkup-reminder-right">
                <img src="resources/doctor-illustration.png" alt="Illustration of a Doctor">
            </div>
        </div>
        <div class="bottom-row">
            <div id="upcoming-appointments">
                <h2>Upcoming Appointments</h2>
                <div id="upcoming-list"></div>
            </div>

            <div id="past-appointments">
                <h2>Past Appointments</h2>
                <div id="past-list"></div>
            </div>

        </div>
    </main>
</body>

<footer>
    <script src="js/user-dashboard.js"></script>
</footer>

</html>
