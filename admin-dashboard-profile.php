<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin-dashboard-profile.css">
    <script src="https://kit.fontawesome.com/cdbb8fb667.js" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
</head>
<body>
    <div class = "admin-dashboard-header">
        <span class = "logo">
            CuraHub
        </span>
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
            <button class = "menu-buttons">
                <img src="images/user_icon.png" alt="">
                Users
            </button>
            <button class = "menu-buttons">
                <img src="images/Calendar.png" alt="">
                Appointments
            </button>
            <button class = "menu-buttons">
                <img src="images/Check_ring.png" alt="">
                Register Provider
            </button>
            <div class = "spacer"></div>
            <button class = "logout-button">
                Log out of admin
            </button>
        </div>

        <!-- Content on the right side -->
        <div class = "user-list">
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
    </div>
</body>
</html>