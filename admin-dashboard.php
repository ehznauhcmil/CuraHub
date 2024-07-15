<?php
    include 'db.php';
    session_start();
    
    $upcoming_appointments = "SELECT * FROM appointment WHERE status IN ('pending', 'accepted')";
    $completed_appointments = "SELECT * FROM appointment WHERE status = 'completed'";
    $upcoming_results = $conn->query($upcoming_appointments);
    $completed_results = $conn->query($completed_appointments);

    include 'db.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $provider_id = 31231;
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $specialization = $_POST['specialization'];
        $qualification = $_POST['qualification'];
        $university = $_POST['university'];
        $contact = $_POST['contact'];

        // Performing insert query execution
            $sql = "INSERT INTO healthcarepro VALUES ('$provider_id', '$first_name', '$last_name', '$specialization', '$qualification', 
                '$university', '$contact')";
            
            if(mysqli_query($conn, $sql)){
                echo "<h3>data stored in a database successfully." ; 

                    header("Refresh: 2; url=admin-dashboard.php");
                    exit();
            } else{
                echo "ERROR: Hush! Sorry $sql. " 
                    . mysqli_error($conn);
            }
            
            // Close connection
            mysqli_close($conn);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin-dashboard.css">
    <script src="https://kit.fontawesome.com/cdbb8fb667.js" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
</head>
<body>
    <div class = "admin-dashboard-header">
        <a href="home-screen.php" class = "logo">CuraHub</a>
        <div class = "spacer"></div>
        <h3>
            Admin Dashboard
        </h3>
        <div class = "spacer"></div>
        <button class = "profile-button">
            Profile
        </button>
    </div>
    <div class = "admin-dashboard-body">
        <div class = "admin-navbar">
            <button class = "menu-buttons" id="user-button" onclick="selectNavItem('nav1')">
                <img src="images/user_icon.png" alt="">
                Users
            </button>
            <button class = "menu-buttons" id="appointments-button" onclick="selectNavItem('nav2')">
                <img src="images/Calendar.png" alt="">
                Appointments
            </button>
            <button class = "menu-buttons" id="register-button" onclick="selectNavItem('nav3')">
                <img src="images/Check_ring.png" alt="">
                Register Provider
            </button>
            <div class = "spacer"></div>
            <button class = "logout-button" id = "logoutButton">
                Log out of admin
            </button>
        </div>

        <!-- Content on the right side -->

        <!-- Profile page -->
        <div class = "user-list" id = "users" >
            <div class = "user-overview-row">

                <!-- container one -->
                <div class = "overview-container">
                    <p style = "font-size: 28px; margin: 0px; margin-bottom: 15px; color: #545454;">
                        Number of users
                    </p>
                    <div>
                        <span style = "font-size: 80px; color: #007A7A">47</span>
                        <img src="images/graph.png" alt="" style = "width: 150px">
                    </div>
                </div>
                <div class = "spacer"></div>
                <!-- container two -->
                <div class = "overview-container">
                    <p style = "font-size: 28px; margin: 0px; margin-bottom: 15px; color: #545454;">
                        Number of users
                    </p>
                    <div>
                        <span style = "font-size: 80px; color: #007A7A">47</span>
                        <img src="images/graph.png" alt="" style = "width: 150px">
                    </div>
                </div>
            </div>
            <hr style="width:100%; margin-top: 20px">
            <h3>
                User List
            </h3>
            <div class = "user-detail-container">
                <div class = "column">
                    <div class = "user-detail-container-fields">
                        <span>Name : </span>
                        <span style = "color: #007A7A; font-weight: 900" >Abdulla Safar</span>
                    </div>
                    <div class = "user-detail-container-fields">
                        <span>Age : </span>
                        <span style = "color: #007A7A; font-weight: 900">22</span>
                    </div>
                </div>
                <div class = "spacer"></div>
                <div>
                    <a href="" class = "see-more-details">
                        <span style = "margin-right: 10px">See More Details</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div> 
        
        <!-- appointments -->
        <div class = "appointment-section" id = "appointments">
            
            <h3>Upcoming Appointments</h3>
            <div class = "upcoming-section" id = "upcoming-section">
                <div class = "appointment-fields">
                    <span>Status</span>
                    <span>Doctor</span>
                    <span>Location</span>
                    <span style = "padding-right: 5%;">Date and Time</span>
                </div>

                <!-- Details Container -->
                <?php
                    if ($upcoming_results->num_rows > 0) {
                        $counter = 0;
                        while ($row = $upcoming_results->fetch_assoc()) {
                            if ($count < 2) {
                            ?>
                            <div class = "details-container">
                                <div class = "status">
                                    Pending
                                </div>
                                <div class = "spacer"></div>
                                <div class = "column" style = "align-items: center;">
                                    <img src="images/doctor_image.png" alt="" style = "width: 60px;">
                                    <span style = "font-size: 14px;">Dr. Paula Angela</span>
                                    <span style = "font-size: 10px">Gynecologist</span>
                                </div>
                                <div class = "spacer"></div>
                                <div class = "column" style = "align-items: center;">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span style = "font-size: 14px;">Suriamas Condo, Jalan Pjs</span>
                                    <span style = "font-size: 14px; color: #676767;">Selangor, Malaysia</span>
                                </div>
                                <div class = "spacer"></div>
                                <div class = "column" style = "align-items: center; margin-right: 11%">
                                    <span style = "color: #00C2C2; font-size: 24px; font-weight: bold">10:30 AM</span>
                                    <span style = "font-size: 20px">21st April, 2024</span>
                                </div>
                            </div>
                            <?php
                                $count++;
                                }
                                else {
                                    ?>
                                    <div class = "details-container" style="display: none;">
                                        <div class = "status">
                                            Pending
                                        </div>
                                        <div class = "spacer"></div>
                                        <div class = "column" style = "align-items: center;">
                                            <img src="images/doctor_image.png" alt="" style = "width: 60px;">
                                            <span style = "font-size: 14px;">Dr. Paula Angela</span>
                                            <span style = "font-size: 10px">Gynecologist</span>
                                        </div>
                                        <div class = "spacer"></div>
                                        <div class = "column" style = "align-items: center;">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <span style = "font-size: 14px;">Suriamas Condo, Jalan Pjs</span>
                                            <span style = "font-size: 14px; color: #676767;">Selangor, Malaysia</span>
                                        </div>
                                        <div class = "spacer"></div>
                                        <div class = "column" style = "align-items: center; margin-right: 11%">
                                            <span style = "color: #00C2C2; font-size: 24px; font-weight: bold">10:30 AM</span>
                                            <span style = "font-size: 20px">21st April, 2024</span>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        }
                        else {
                            echo '<div class="no-appointments">No Upcoming Appointments</div>';
                        }
                        ?>
                <button class = "expand-button" onclick="loadMoreAppointments('upcoming')" id = "expand-upcoming-button">
                    <i class="fa-solid fa-caret-down"></i>
                </button>
            </div>

            <!-- Completed Appointments section -->
            <h3>Completed Appointments</h3>
            <div class = "upcoming-section" id = "completed-section">
                <div class = "appointment-fields">
                    <span>Status</span>
                    <span>Doctor</span>
                    <span>Location</span>
                    <span style = "padding-right: 5%;">Date and Time</span>
                </div>

                <!-- Details Container -->
                <?php
                    if ($completed_results->num_rows > 0) {
                        $count = 0;
                        while ($row = $completed_results->fetch_assoc()) {
                            if ($count < 2) {
                            ?>
                            <div class = "details-container">
                                <div class = "status">
                                    Completed
                                </div>
                                <div class = "spacer"></div>
                                <div class = "column" style = "align-items: center;">
                                    <img src="images/doctor_image.png" alt="" style = "width: 60px;">
                                    <span style = "font-size: 14px;">Dr. Paula Angela</span>
                                    <span style = "font-size: 10px">Gynecologist</span>
                                </div>
                                <div class = "spacer"></div>
                                <div class = "column" style = "align-items: center;">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span style = "font-size: 14px;">Suriamas Condo, Jalan Pjs</span>
                                    <span style = "font-size: 14px; color: #676767;">Selangor, Malaysia</span>
                                </div>
                                <div class = "spacer"></div>
                                <div class = "column" style = "align-items: center; margin-right: 11%">
                                    <span style = "color: #00C2C2; font-size: 24px; font-weight: bold">10:30 AM</span>
                                    <span style = "font-size: 20px">21st April, 2024</span>
                                </div>
                            </div>
                            <?php
                                $count++;
                                }
                                else {
                                    ?>
                                        <div class = "details-container" style="display: none;">
                                            <div class = "status">
                                                Completed
                                            </div>
                                            <div class = "spacer"></div>
                                            <div class = "column" style = "align-items: center;">
                                                <img src="images/doctor_image.png" alt="" style = "width: 60px;">
                                                <span style = "font-size: 14px;">Dr. Paula Angela</span>
                                                <span style = "font-size: 10px">Gynecologist</span>
                                            </div>
                                            <div class = "spacer"></div>
                                            <div class = "column" style = "align-items: center;">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <span style = "font-size: 14px;">Suriamas Condo, Jalan Pjs</span>
                                                <span style = "font-size: 14px; color: #676767;">Selangor, Malaysia</span>
                                            </div>
                                            <div class = "spacer"></div>
                                            <div class = "column" style = "align-items: center; margin-right: 11%">
                                                <span style = "color: #00C2C2; font-size: 24px; font-weight: bold">10:30 AM</span>
                                                <span style = "font-size: 20px">21st April, 2024</span>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        }
                        else {
                            echo '<div class="no-appointments">No Completed Appointments</div>';
                        }
                        // Close the database connection
                        // $conn->close();
                        ?>
                <button class = "expand-button" id = "expand-completed-button" onclick="loadMoreAppointments('completed')">
                    <i class="fa-solid fa-caret-down"></i>
                </button>
            </div>
        </div>

        <!-- register provider -->
        <div class= "register" id = "register">
            <h1>Register Healthcare Provider</h1>
            <form action="admin-dashboard.php" class = "register-form" method = "post" id = "register-form">
                <div class = "register-healthcare-grid">
                    <div class = "fields">
                        <h3>First Name</h3>
                        <input type="text" id="first_name" name="first_name" 
                            placeholder = "Type Something Here" required>
                    </div>
                    <div class = "fields">
                        <h3>Last Name</h3>
                        <input type="text" id="last_name" name="last_name" 
                            placeholder = "Type Something Here" required>
                    </div>
                    <div class = "fields">
                        <h3>Specialization</h3>
                        <input type="text" id="specialization" name="specialization" 
                            placeholder = "Type Something Here" required>
                    </div>
                    <div class = "fields">
                        <h3>Qualification</h3>
                        <input type="text" id="qualification" name="qualification" 
                            placeholder = "Type Something Here" required>
                    </div>
                    <div class = "fields">
                        <h3>University</h3>
                        <input type="text" id="university" name="university" 
                            placeholder = "Type Something Here" required>
                    </div>
                    <div class = "fields">
                        <h3>Contact</h3>
                        <input type="text" id="contact" name="contact" 
                            placeholder = "Type Something Here" required>
                    </div>
                </div>
                <input  type="submit" value = "Submit">
            </form>
        </div>
    </div>

    <script src="js/admin-dashboard.js"></script>
</body>
</html>