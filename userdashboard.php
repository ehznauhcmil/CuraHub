<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
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
    <link rel="icon" href="resources/site-logo.png" type="image/png"> <!-- INSERT SITE LOGO -->
    <!-- IMPORT FILES -->
    <link rel="stylesheet" href="css/userdashboard.css">
</head>

<body>
    <aside class="sidebar">
        <div class="sidebar-navtop">
            <p><a href="home-screen.php"><img src="resources/back-icon.png" alt="Go Back to Homepage Icon"></a></p>
            <p><a href="userdashboard.php"><img src="resources/dashboard-icon.png" alt="User Dashboard Icon"></a></p>
            <p><a href="appointment.php"><img src="resources/calendar-icon.png" alt="Appointment Icon"></a></p>
            <p><a href="profileM.php"><img src="resources/profile-icon.png" alt="Profile Icon"></a></p>
            <p><a href="medication.php"><img src="resources/medication-icon.png" alt="Medication Icon"></a></p>
            <p><a href="medicalReport.php"><img src="resources/medreport-icon.png" alt="Medical Report Icon"></a></p>
            <p><a href="#"><img src="resources/settings-icon.png" alt="Settings Icon"></a></p>
        </div>
        <div class="sidebar-navbottom">
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
                    <button class="check-now-button" onclick="doctors-bookings.php">Check Now</button>
                    <button class="view-report-button" onclick="medicalreport.php">View Report</button>
                </div>
            </div>
            <div class="checkup-reminder-right">
                <img src="resources/doctor-illustration.png" alt="Illustration of a Doctor">
            </div>
        </div>
        <div class="bottom-row">
            <div class="upcoming-checkup-container">
                <h2>Upcoming Checkup</h2>
                <div class="scroller">
                    <div class="upcoming-checkup-list">
                        <div class="list-date">
                            <h3>11 Jul</h3>
                            <h3>9am</h3>
                        </div>
                        <div class="list-details">
                            <h3>Blood Test</h3>
                            <p>Subang Jaya Medical Centre</p>
                        </div>
                    </div>
                    <div class="upcoming-checkup-list">
                        <div class="list-date">
                            <h3>23 Sept</h3>
                            <h3>2pm</h3>
                        </div>
                        <div class="list-details">
                            <h3>MRI Scan</h3>
                            <p>Sunway Medical Centre</p>
                        </div>
                    </div>
                    <div class="upcoming-checkup-list">
                        <div class="list-date">
                            <h3>30 Nov</h3>
                            <h3>11am</h3>
                        </div>
                        <div class="list-details">
                            <h3>Thyroid Function Test</h3>
                            <p>UNI KL Clinic</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="last-checkup-container">
                <h2>Your Last Health Check</h2>
                <div class="scroller">
                    <div class="last-checkup-list">
                        <img src="resources/kidney-checkup-icon.png" alt="Kidney Checkup Icon">
                        <div class="list-details">
                            <h3>Regular Kidney Check</h3>
                            <p>09 October 2023</p>
                        </div>
                    </div>
                    <div class="last-checkup-list">
                        <img src="resources/dental-checkup-icon.png" alt="Dental Checkup Icon">
                        <div class="list-details">
                            <h3>Dental Health</h3>
                            <p>18 January 2024</p>
                        </div>
                    </div>
                    <div class="last-checkup-list">
                        <img src="resources/heart-checkup-icon.png" alt="Heart Checkup Icon">
                        <div class="list-details">
                            <h3>Heart Stress Test</h3>
                            <p>21 August 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>