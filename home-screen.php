<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/home-screen.css">
    <script src="https://kit.fontawesome.com/cdbb8fb667.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="nav-bar">
        <h1>CuraHub</h1>
        <a href="">About us</a>
        <a href="">Services</a>
        <a href="">Find Doctors</a>
        <a href="">Upcoming Appointments</a>
        <button class="dashboard-button" id="dashboardButton">Dashboard</button>
        <i class="fa-regular fa-bell"></i>
    </div>

    <!-- Book your medical appointment online -->
    <div class="section-1">
        <div class="column">
            <h1 style="font-size: 75px; color: white; margin-top: 7%">
                Book Your Medical Appointment Online.
            </h1>
            <button class="find-doctor-button" style="border: none; margin-right: 35px">
                Find a Doctor
            </button>
            <button class="find-healthcare-button">
                Find a Healthcare Center
            </button>
            <div style="color: white; padding-top: 25px">
                Find a doctor or a healthcare center near you to book a medical appointment
            </div>
        </div>
        <img src="images/doctor_image_home.png" alt="" style="width: 45%">
    </div>

    <!-- How Does it work -->
    <div class="section-2">
        <h3 style="margin-bottom: 10px">How Does It Work?</h3>
        <span style="font-size: 20px; color: #919191; ">
            Discover and book doctors or healthcare around you based on your needs.
        </span>
        <img src="images/process.png" alt="" class="process">
        <div class="process-description">
            <span>
                Find a doctor or medical center near you.
            </span>
            <span>
                Book an appointment with your preferred choice.
            </span>
            <span>
                Get personalized healthcare services tailored to you.
            </span>
        </div>
        <button class="explore-doctor-button">
            Explore Doctors Now
        </button>
    </div>

    <!-- Our Top Doctors -->
    <div class="top-doctors">
        <h3 style="margin: 0px;margin-bottom: 50px; color: white">
            Our Top Doctors
        </h3>
        <div class="doctors">
            <div class="doctor-container">
                <img src="images/doctor-home2.png" alt="" style="width: 30%; margin: 0px 10px 0px 10px">
                <div>
                    <span style="font-size: 30px">Dr. Lena White</span>
                    <span style="font-size: 24px; color: #313131">Gynecologist</span>
                    <button class="see-profile-button">
                        See Profile
                    </button>
                </div>
            </div>
            <div class="doctor-container">
                <img src="images/doctor-home2.png" alt="" style="width: 30%; margin: 0px 10px 0px 10px">
                <div>
                    <span style="font-size: 30px">Dr. Karen Sun</span>
                    <span style="font-size: 24px; color: #313131">Dermatologist</span>
                    <button class="see-profile-button">
                        See Profile
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- What our beloved users say -->
    <div class="feedback-section">
        <h3>
            What our beloved users say about us
        </h3>
        <h6>
            Latest Reviews
        </h6>
        <div class="reviews">
            <div class="review-container">
                <img src="images/Rating.png" alt="" style="width: 35%">
                <h6>Awesome Experience</h6>
                <p>It was a really nice experience and I enjoyed it!</p>
                <div class="reviews">
                    <img src="images/Avatar.png" alt="" style="width: 10%; margin-right: 10px">
                    <span style="display: inline-block">
                        <div style="color: #757575">Bonifacio Ronald</div>
                        <div style="color: #B3B3B3">21st April, 2024</div>
                    </span>
                </div>
            </div>
            <div class="spacer"></div>
            <div class="review-container">
                <img src="images/Rating.png" alt="" style="width: 35%">
                <h6>Nice Service</h6>
                <p>I had a great user experience throughout the process!</p>
                <div class="reviews">
                    <img src="images/Avatar.png" alt="" style="width: 10%; margin-right: 10px">
                    <span style="display: inline-block">
                        <div style="color: #757575">Shifa Parkar</div>
                        <div style="color: #B3B3B3">31st Jan, 2024</div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>

<footer>
    <div style="width 20%">
        <h1 style="margin-top: 0px">CuraHub</h1>
        <div style="color: #656565;">
            Committed to Making Healthcare Accessible
        </div>
        <div style="color: #656565;">
            by Connecting You with the Best Doctors
        </div>
        <form action="">
            <input type="email" id="email" name="email" placeholder="Your Email" required>
            <input type="submit" value="Subscribe">
        </form>
    </div>
    <div class="footer-section">
        <h2>Services</h2>
        <a href="">General Consultation</a>
        <a href="">Medical Checkup</a>
        <a href="">Mental Health</a>
        <a href="">Blood Test</a>
    </div>
    <div class="footer-section">
        <h2>Resources</h2>
        <a href="">Customers</a>
        <a href="">Stories</a>
        <a href="">Chat</a>
        <a href="">Documentation</a>
    </div>
    <div class="footer-section">
        <h2>Company</h2>
        <a href="">About us</a>
        <a href="">Join Our Team</a>
        <a href="">Pricing</a>
        <a href="">Press</a>
    </div>
    <div class="footer-section">
        <h2>Contact</h2>
        <a href="">FAQs</a>
        <a href="">Contact Us</a>
    </div>
</footer>
<div class="copyrights">
    © 2024 CuraHub. All rights reserved.
</div>

<script>
    function showScreen(screenId) {
        // Hide all screens
        var screens = document.querySelectorAll('.screen');
        screens.forEach(function (screen) {
            screen.classList.remove('active');
        });

        // Show the selected screen
        document.getElementById(screenId).classList.add('active');
    }

    document.getElementById("dashboardButton").addEventListener("click", function () {

        var userType = '<?php echo $_SESSION['usertype']; ?>';
        if (userType == 'admin') {
            window.location.href = "admin-dashboard.php";
        }
        else if (userType == 'user') {
            window.location.href = "user-dashboard.php";
        }
    });
</script>

</html>