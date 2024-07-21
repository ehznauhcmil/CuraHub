<?php
include 'db-connection.php';
include 'admin-dashboard/queries.php';
include 'admin-dashboard/form-handler.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id'])) {
    $appointmentId = $_GET['id'];
    
    $sql = "DELETE FROM appointments WHERE appointment_id = '$appointmentId'";
        if ($connect->query($sql) === TRUE) {
            // echo "Status updated successfully";
        } else {
            echo "Error updating status: " . $connect->error;
        }
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
    <div id="statusModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeButton">&times;</span>
            <form action="change-status.php" method="post">
                <h3>Select the current status</h3>
                <select name="status-selector" id="status-selector" class="status-selector">
                    <option value="Confirmed">Confirmed</option>
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
                <input type="hidden" name="appointment_id" id="appointment_id">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    <div class="admin-dashboard-header">
        <a href="home-screen.php" class="logo">CuraHub</a>
        <div class="spacer"></div>
        <h3>
            Admin Dashboard
        </h3>
        <div class="spacer"></div>
        <button class="profile-button">
            Profile
        </button>
    </div>
    <div class="admin-dashboard-body">
        <div class="admin-navbar">
            <button class="menu-buttons" id="user-button" onclick="selectNavItem('nav1')">
                <img src="images/user_icon.png" alt="">
                Users
            </button>
            <button class="menu-buttons" id="appointments-button" onclick="selectNavItem('nav2')">
                <img src="images/Calendar.png" alt="">
                Appointments
            </button>
            <button class="menu-buttons" id="register-button" onclick="selectNavItem('nav3')">
                <img src="images/Check_ring.png" alt="">
                Register Provider
            </button>
            <div class="spacer"></div>
            <button class="logout-button" id="logoutButton">
                Log out of admin
            </button>
        </div>

        <!-- Content on the right side -->

        <!-- Profile page -->
        <div class="user-list" id="users">
            <div class="user-overview-row">

                <!-- container one -->
                <div class="overview-container">
                    <p style="font-size: 28px; margin: 0px; margin-bottom: 15px; color: #545454;">
                        Number of users
                    </p>
                    <div>
                        <span style = "font-size: 80px; color: #007A7A"><?php echo $total_users ?></span>
                        <img src="images/graph.png" alt="" style="width: 150px">
                    </div>
                </div>
                <div class="spacer"></div>
                <!-- container two -->
                <div class="overview-container">
                    <p style="font-size: 28px; margin: 0px; margin-bottom: 15px; color: #545454;">
                        Number of Appointments
                    </p>
                    <div>
                    <span style = "font-size: 80px; color: #007A7A"><?php echo $total_appointments ?></span>
                        <img src="images/graph.png" alt="" style="width: 150px">
                    </div>
                </div>
            </div>
            <hr style="width:100%; margin-top: 20px">
            <h3>
                User List
            </h3>
            <?php
            if ($user_results->num_rows > 0) {
                while ($row = $user_results->fetch_assoc()) {
                    $dob = new DateTime($row['date_of_birth']);
                    $today = new DateTime();
                    $age = $today->diff($dob)->y; 
                    ?>
                    <div class="user-detail-container">
                        <div class="column">
                            <div class="user-detail-container-fields">
                                <span>Name : </span>
                                <span style = "color: #007A7A; font-weight: 900" >
                                    <?php echo $row['first_name'].' '.$row['last_name']; ?>
                                </span>
                            </div>
                            <div class="user-detail-container-fields">
                                <span>Age : </span>
                                <span style = "color: #007A7A; font-weight: 900"><?php echo $age; ?></span>
                            </div>
                        </div>
                        <div class="spacer"></div>
                        <div>
                            <a href="" class="see-more-details">
                                <span style="margin-right: 10px">See More Details</span>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

        <!-- appointments -->
        <div class="appointment-section" id="appointments">

            <div class = "row">
                <h3 class="display: inline-block;">Upcoming Appointments</h3>
                <div class="spacer"></div>
                <button class="edit-button" id="editButton" name="edit-button">Delete Appointment</button>
            </div>
            <div class="upcoming-section" id="upcoming-section">
                <div class="appointment-fields">
                    <span>Status</span>
                    <span sytle = "padding-right: 5%;">Doctor</span>
                    <span sytle = "padding-right: 5%;">Location</span>
                    <span style = "margin-right: 6%; padding-right: 0px">Date and Time</span>
                </div>

                <!-- Details Container -->
                <?php
                if ($upcoming_results->num_rows > 0) { // only display if there are upcoming appointments
                    $count = 0;
                    while ($row = $upcoming_results->fetch_assoc()) { // Access each upcoming appointment using a loop
                        if ($count < 2) {
                            ?>
                            <div class="details-container">
                                <div class = "status" 
                                    data-status="<?php echo htmlspecialchars($row['status']); ?>"
                                    data-appointment_id="<?php echo htmlspecialchars($row['appointment_id']); ?>">
                                    <?php echo $row['status']; ?>
                                </div>
                                <div class="spacer"></div>
                                <div class="column" style="align-items: center;">
                                    <img src="images/doctor_image.png" alt="" style="width: 60px;">
                                    <span style="font-size: 14px;"><?php echo $row['first_name'].' '.$row['last_name']; ?></span>
                                    <span style="font-size: 10px"><?php echo $row['specialization']; ?></span>
                                </div>
                                <div class="spacer"></div>
                                <div class="column" style="align-items: center;">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span style="font-size: 14px; width: 200px"><?php echo $row['hospital_address']; ?></span>
                                    <!-- <span style="font-size: 14px; color: #676767;">Selangor, Malaysia</span> -->
                                </div>
                                <div class="spacer"></div>
                                <div class="column" style="align-items: center; margin-right: 3%">
                                    <span style="color: #00C2C2; font-size: 20px; font-weight: bold">
                                        <?php echo $row['start_time'].'-'.$row['end_time']; ?>
                                    </span>
                                    <span style="font-size: 20px"><?php echo $row['date']; ?></span>
                                </div>
                                <button class = "delete-button" 
                                    onclick="deleteAppointment(<?php echo $row['appointment_id']; ?>)">
                                    Delete
                                </button>
                            </div>
                            <?php
                            $count++;
                        } else {
                            ?>
                            <div class="details-container" style="display: none;">
                                <div class = "status" 
                                    data-status="<?php echo htmlspecialchars($row['status']); ?>"
                                    data-appointment_id="<?php echo htmlspecialchars($row['appointment_id']); ?>">
                                    <?php echo $row['status']; ?>
                                </div>
                                <div class="spacer"></div>
                                <div class="column" style="align-items: center;">
                                    <img src="images/doctor_image.png" alt="" style="width: 60px;">
                                    <span style="font-size: 14px;"><?php echo $row['first_name'].' '.$row['last_name']; ?></span>
                                    <span style="font-size: 10px"><?php echo $row['specialization']; ?></span>
                                </div>
                                <div class="spacer"></div>
                                <div class="column" style="align-items: center;">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span style="font-size: 14px; width: 200px"><?php echo $row['hospital_address']; ?></span>
                                    <!-- <span style="font-size: 14px; color: #676767;">Selangor, Malaysia</span> -->
                                </div>
                                <div class="spacer"></div>
                                <div class="column" style="align-items: center; margin-right: 3%">
                                    <span style="color: #00C2C2; font-size: 20px; font-weight: bold">
                                        <?php echo $row['start_time'].'-'.$row['end_time']; ?>
                                    </span>
                                    <span style="font-size: 20px"><?php echo $row['date']; ?></span>
                                </div>
                                <button class = "delete-button" 
                                    onclick="deleteAppointment(<?php echo $row['appointment_id']; ?>)">
                                    Delete
                                </button>
                            </div>
                            <?php
                        }
                    }
                } else {
                    echo '<div class="no-appointments">No Upcoming Appointments</div>';
                }
                ?>
                <button class="expand-button" onclick="loadMoreAppointments('upcoming')" id="expand-upcoming-button">
                    <i class="fa-solid fa-caret-down"></i>
                </button>
            </div>

            <!-- Completed Appointments section -->
            <h3>Completed Appointments</h3>
            <div class="upcoming-section" id="completed-section">
                <div class="appointment-fields">
                    <span>Status</span>
                    <span>Doctor</span>
                    <span>Location</span>
                    <span style="padding-right: 5%;">Date and Time</span>
                </div>

                <!-- Details Container -->
                <?php
                if ($completed_results->num_rows > 0) {
                    $count = 0;
                    while ($row = $completed_results->fetch_assoc()) {
                        if ($count < 2) {
                            ?>
                            <div class="details-container">
                                <div class = "status" 
                                    data-status="<?php echo htmlspecialchars($row['status']); ?>"
                                    data-appointment_id="<?php echo htmlspecialchars($row['appointment_id']); ?>">
                                    <?php echo $row['status']; ?>
                                </div>
                                <div class="spacer"></div>
                                <div class="column" style="align-items: center;">
                                    <img src="images/doctor_image.png" alt="" style="width: 60px;">
                                    <span style="font-size: 14px;"><?php echo $row['first_name'].' '.$row['last_name']; ?></span>
                                    <span style="font-size: 10px"><?php echo $row['specialization']; ?></span>
                                </div>
                                <div class="spacer"></div>
                                <div class="column" style="align-items: center;">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span style="font-size: 14px; width: 200px"><?php echo $row['hospital_address']; ?></span>
                                    <!-- <span style="font-size: 14px; color: #676767;">Selangor, Malaysia</span> -->
                                </div>
                                <div class="spacer"></div>
                                <div class="column" style="align-items: center; margin-right: 3%">
                                    <span style="color: #00C2C2; font-size: 20px; font-weight: bold">
                                        <?php echo $row['start_time'].'-'.$row['end_time']; ?>
                                    </span>
                                    <span style="font-size: 20px"><?php echo $row['date']; ?></span>
                                </div>
                            </div>
                            <?php
                            $count++;
                        } else {
                            ?>
                            <div class="details-container" style="display: none;">
                                <div class = "status" 
                                    data-status="<?php echo htmlspecialchars($row['status']); ?>"
                                    data-appointment_id="<?php echo htmlspecialchars($row['appointment_id']); ?>">
                                    <?php echo $row['status']; ?>
                                </div>
                                <div class="spacer"></div>
                                <div class="column" style="align-items: center;">
                                    <img src="images/doctor_image.png" alt="" style="width: 60px;">
                                    <span style="font-size: 14px;"><?php echo $row['first_name'].' '.$row['last_name']; ?></span>
                                    <span style="font-size: 10px"><?php echo $row['specialization']; ?></span>
                                </div>
                                <div class="spacer"></div>
                                <div class="column" style="align-items: center;">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span style="font-size: 14px; width: 200px"><?php echo $row['hospital_address']; ?></span>
                                    <!-- <span style="font-size: 14px; color: #676767;">Selangor, Malaysia</span> -->
                                </div>
                                <div class="spacer"></div>
                                <div class="column" style="align-items: center; margin-right: 3%">
                                    <span style="color: #00C2C2; font-size: 20px; font-weight: bold">
                                        <?php echo $row['start_time'].'-'.$row['end_time']; ?>
                                    </span>
                                    <span style="font-size: 20px"><?php echo $row['date']; ?></span>
                                </div>
                            </div>
                            <?php
                        }
                    }
                } else {
                    echo '<div class="no-appointments">No Completed Appointments</div>';
                }
                // Close the database connection
                // $connect->close();
                ?>
                <button class="expand-button" id="expand-completed-button" onclick="loadMoreAppointments('completed')">
                    <i class="fa-solid fa-caret-down"></i>
                </button>
            </div>
        </div>

        <!-- register provider -->
        <div class="register" id="register">
            <h1>Register Healthcare Provider</h1>
            <form action="admin-dashboard.php" class="register-form" method="post" id="register-form">
                <div class="register-healthcare-grid">
                    <div class="fields">
                        <h3>First Name</h3>
                        <input type="text" id="first_name" name="first_name" placeholder="Type Something Here" required>
                    </div>
                    <div class="fields">
                        <h3>Last Name</h3>
                        <input type="text" id="last_name" name="last_name" placeholder="Type Something Here" required>
                    </div>
                    <div class="fields">
                        <h3>Specialization</h3>
                        <input type="text" id="specialization" name="specialization" placeholder="Type Something Here"
                            required>
                    </div>
                    <div class="fields">
                        <h3>Qualification</h3>
                        <input type="text" id="qualification" name="qualification" placeholder="Type Something Here"
                            required>
                    </div>
                    <div class="fields">
                        <h3>University</h3>
                        <input type="text" id="university" name="university" placeholder="Type Something Here" required>
                    </div>
                    <div class="fields">
                        <h3>Contact</h3>
                        <input type="text" id="contact" name="contact" placeholder="Type Something Here" required>
                    </div>
                </div>
                <div class = "fields">
                    <h3>Hospital</h3>
                    <select id="hospital_id" name="hospital_id" class = "hospital_id_dropdown">
                        <?php echo $hospital_options; ?>
                    </select>
                </div>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <script src="js/admin-dashboard.js"></script>
</body>

</html>